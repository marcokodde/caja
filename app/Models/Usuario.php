<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $fillable =  [
        'full_name',
        'email',
        'address',
        'phone',
        'start',
        'end',
        'date_reserve',
        'negocio'
    ];
}
