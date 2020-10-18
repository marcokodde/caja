<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {
	use HandlesAuthorization;

	/**
	 * Determine whether the user can view any models.
	 *
	 * @param  \App\User  $usera
	 * @return mixed
	 */
	public function viewAny(User $usera) {
		//
	}

	/**
	 * Determine whether the user can create models.
	 *
	 * @param  \App\User  $usera
	 * @return mixed
	 */
	public function create(User $usera) {
		//
		return $usera->id > 0;
	}

	/**
	 * Determine whether the user can view the model.
	 *
	 * @param  \App\User  $usera
	 * @param  \App\User  $user
	 * @return mixed
	 */
	public function view(User $usera, User $user, $permissions = Null) {
		if ($usera->hasPermission($permissions[0])) {
			return true;
		} else {
			if ($usera->hasPermission($permissions[1])) {
				return $usera->id === $user->id;
			}
		}
		return false;
	}
	/**
	 * Determine whether the user can update the model.
	 *
	 * @param  \App\User  $usera
	 * @param  \App\User  $user
	 * @return mixed
	 */
	public function update(User $usera, User $user, $permissions = Null) {
		if ($usera->hasPermission($permissions[0])) {
			return true;
		} else {
			if ($usera->hasPermission($permissions[1])) {
				return $usera->id === $user->id;
			}
		}
		return false;
	}

}
