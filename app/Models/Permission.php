<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

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
