<?php

namespace App\Http\Controllers;

use App\excellsus\models\permission;
use App\excellsus\models\role;
use Illuminate\Http\Request;

class RoleController extends Controller {

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
        $this->authorize('hasaccess', 'roles.index');
        $roles = Role::Orderby('id', 'ASC')->paginate(10);
        $header = 'Roles';
        $slot = 'Slot';
		return view('roles.index', compact('roles','header','slot'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
        return 'Dentro de crear roles';
		$this->authorize('hasaccess', 'roles.create');
		$permissions = Permission::get();
		return view('roles.create', compact('permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->authorize('hasaccess', 'roles.create');
		$request->validate([
			'name' => 'required|max:50|unique:roles,name',
			'description' => 'required',
		]);

		$role = Role::create($request->all());

		if ($request->permission) {
			$role->permissions()->sync($request->permission);
		}

		return redirect()->route('role.index')->with('status_success', 'Role saved successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Role $role) {
		$this->authorize('hasaccess', 'roles.show');
		$permission_role = [];

		foreach ($role->permissions as $permission) {
			$permission_role[] = $permission->id;
		};
		$permissions = Permission::get();
		return view('roles.view', compact('role', 'permissions', 'permission_role'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Role $role) {
		$this->authorize('hasaccess', 'roles.edit');
		$permission_role = [];

		foreach ($role->permissions as $permission) {
			$permission_role[] = $permission->id;
		};
		$permissions = Permission::get();
		return view('roles.edit', compact('role', 'permissions', 'permission_role'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Role $role) {
		$this->authorize('hasaccess', 'roles.edit');
		$request->validate([
			'name' => 'required|max:50|unique:roles,name,' . $role->id,
			'description' => 'required',
		]);

		$role->update($request->all());

		$role->permissions()->sync($request->permission);
		return redirect()->route('role.index')->with('status_success', 'Role updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Role $role) {
		$this->authorize('hasaccess', 'roles.destroy');
		$role->delete();
		return redirect()->route('role.index')->with('status_success', 'Role successfully removed');
	}
}
