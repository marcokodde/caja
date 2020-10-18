<?php

namespace App\Http\Controllers;

use App\excellsus\models\permission;
use App\excellsus\models\role;
use Illuminate\Http\Request;

class PermissionController extends Controller {

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
		$this->authorize('hasaccess', 'permissions.index');
		$permissions = Permission::Orderby('id', 'ASC')->paginate(10);
		return view('permissions.index', compact('permissions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$this->authorize('hasaccess', 'permissions.create');
		$roles = Role::get();
		return view('permissions.create', compact('roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->authorize('hasaccess', 'permissions.create');
		$request->validate([
			'name' => 'required|max:50|unique:permissions,name',
			'name' => 'required|max:50|unique:permissions,name',
			'description' => 'required',
		]);

		$permission = Permission::create($request->all());

		if ($request->role) {
			$permission->roles()->sync($request->role);
		}

		return redirect()->route('permission.index')->with('status_success', 'Permission saved successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Permission $permission) {
		$this->authorize('hasaccess', 'permissions.show');
		$role_permissions = [];

		foreach ($permission->roles as $role) {
			$role_permissions[] = $role->id;
		};
		$roles = Role::get();
		return view('permissions.view', compact('permission', 'roles', 'role_permissions'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Permission $permission) {
		$this->authorize('hasaccess', 'permissions.edit');
		$role_permissions = [];

		foreach ($permission->roles as $role) {
			$role_permissions[] = $role->id;
		};

		$roles = Role::get();
		return view('permissions.edit', compact('permission', 'roles', 'role_permissions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Permission $permission) {
		$this->authorize('hasaccess', 'permissions.edit');
		$request->validate([
			'name' => 'required|max:50|unique:permissions,name,' . $permission->id,
			'slug' => 'required|max:50|unique:permissions,slug,' . $permission->id,
			'description' => 'required',
		]);

		$permission->update($request->all());

		$permission->roles()->detach();
		if ($request->role) {
			$permission->roles()->sync($request->role);
		}

		return redirect()->route('permission.index')->with('status_success', 'Permission updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Permission $permission) {
		$this->authorize('hasaccess', 'permissions.destroy');
		$permission->delete();
		return redirect()->route('permission.index')->with('status_success', 'Permission successfully removed');
	}
}
