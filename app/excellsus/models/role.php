<?php

namespace App\excellsus\models;

use Illuminate\Database\Eloquent\Model;

class role extends Model {
	//
	protected $fillable = [
		'name', 'description', 'full_access',
	];

	public function users() {
		return $this->belongsToMany('App\User')->withTimesTamps();
	}

	public function permissions() {
		return $this->belongsToMany('App\excellsus\models\Permission')->withTimesTamps();
	}

	public function permissions_by_name() {
		return $this->belongsToMany('App\excellsus\models\Permission')->withTimesTamps()->orderby('name');
	}

	public function hasPermissions() {
		return $this->permissions->count();
	}
}
