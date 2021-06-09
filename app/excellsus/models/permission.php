<?php

namespace App\excellsus\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model {
	protected $fillable = [
		'name', 'slug', 'description',
	];

	// Relaciones

	public function roles() {
		return $this->belongsToMany('App\excellsus\models\Role')->withTimesTamps();
	}

	public function users() {
		return $this->belongsToMany('App\models\User')->withTimesTamps();
	}

	public function hasRoles() {
		return $this->roles->count();
	}
}
