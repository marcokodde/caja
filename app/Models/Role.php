<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
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
