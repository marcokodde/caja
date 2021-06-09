<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CustomerId extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'folio',
		   'expire_at',
        'image',
        'identification_id',
        'customer_id'
    ];
// Customerid -->Customer (Un clienteid pertenece a un cliente)
    public function customer() {
		return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }
// Customerid -->Identificacion (Un clienteid tiene una identificacion)
    public function identification() {
      return $this->belongsTo('App\Models\Identification', 'identification_id', 'id');
      }

}