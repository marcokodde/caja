<?php

namespace App\Http\Controllers;

use App\excellsus\models\role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$this->authorize('hasaccess', 'users.index');
		$users = User::with(['roles'])->Orderby('id', 'ASC')->paginate(10);
		return view('users.index', compact('users'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user) {
		//$this->authorize('hasaccess', 'users.show');
		$this->authorize('view', [$user, ['users.show', 'usersown.show']]);
		$roles = Role::Orderby('name', 'ASC')->get();
		return view('users.view', compact('user', 'roles'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user) {
		$this->authorize('update', [$user, ['users.edit', 'usersown.edit']]);
		$roles = Role::Orderby('name', 'ASC')->get();
		return view('users.edit', compact('user', 'roles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		$this->authorize('update', [$user, ['users.edit', 'usersown.edit']]);
		$request->validate([
			'name' => 'required', 'string', 'max:255',
			'email' => 'required', 'email', 'max:255', 'unique:users,email,' . $user->id,
		]);

		$user->update($request->all());

		$user->roles()->sync($request->roles);
		return redirect()->route('user.index')->with('status_success', 'User updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user) {
		$this->authorize('hasaccess', 'users.destroy');
		$user->delete();
		return redirect()->route('user.index')->with('status_success', 'User successfully Removed');
	}

	public function create() {
		//$this->authorize('create', User::class);
		//return 'Creando usuario';
	}
}
