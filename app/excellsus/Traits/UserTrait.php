<?php

namespace App\excellsus\Traits;

trait UserTrait {

	public function roles() {
		return $this->belongsToMany('App\excellsus\models\Role')->withTimesTamps();
	}

	public function roles_by_name() {
		return $this->belongsToMany('App\excellsus\models\Role')->withTimesTamps()->orderby('name');
	}

	public function hasPermission($permission) {
		foreach ($this->roles as $role) {
			if ($role->full_access) {
				return true;
			};

			foreach ($role->permissions as $role_permission) {
				if ($role_permission->slug == $permission) {
					return true;
				}

			}
		}
		return false;
	}
}
