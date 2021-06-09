<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon as CarbonCarbon;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable =  [
        'first_name',
        'middle_name',
        'last_name',
        'maternal_name',
        'birthday',
        'email',
        'address',
        'zipcode',
        'phone',
        'company_id',
        'country_id',
        'occupation_id',
        'vip_id',
        'photo',
        'user_id',
        'active',
        'black_list',
        'marked',
    ];

    /*+-----------------------------+
      | Atributos Get y Set         |
      +-----------------------------+
    */
    // Name
    public function getNameAttribute()
    {
        return ucwords($this->first_name) . ' ' . ucwords($this->last_name);   
    }

    
    /*+-----------------------------+
      | Relaciones entre tablas     |
      +-----------------------------+
    */


    // Customer <---CustomerId  (Un cliente tiene muchas identificaciones)
    public function customerids(){
        return $this->hasMany('App\Models\CustomerId', 'customer_id', 'id');
    }

    // Customer -->Authorization (Un cliente tiene muchas autorizaciones)
    public function authorizations() {
        return $this->hasMany('App\Models\Authorization');
    }


    // Customer -->Zipcodes (Un cliente pertenece a un zipcode)
    public function zipcode() {
        return $this->belongsTo('App\Models\Zipcode', 'zipcode', 'zipcode');
    }

    // Customer -->Country (Un cliente pertenece a un pais)
    public function country() {
        return $this->belongsTo('App\Models\Country','country_id','id');
    }

    // Customer -->Occupation (Un cliente tiene una ocupacion)
    public function occupation() {
        return $this->belongsTo('App\Models\Occupation');
    }

    // Customer -->User (Un cliente fue creado por un usuario)
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    // Customer -->Vip (Un cliente tiene o puede ser vip)
    public function vip() {
        return $this->belongsTo('App\Models\Vip');
    }

    // Customer -->Company (Un cliente pertenece a una empresa)
    public function company() {
        return $this->belongsTo('App\Models\Company');
    }

      /*+-----------------------------+
      | Busquedas en tablas     |
      +-----------------------------+
    */
    

    public function scopeFullName($query,$valor)
    {
        if ( trim($valor) != "") {
           $query->where('first_name','LIKE',"%$valor%")
                 ->orWhere('middle_name','LIKE',"%$valor%")
                 ->orWhere('last_name','LIKE',"%$valor%")
                 ->orWhere('maternal_name','LIKE',"%$valor%");
        }
    }

    public function scopeSpanish($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('spanish','LIKE',"%$valor%");
        }
    }

    public function scopeEnglish($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('english','LIKE',"%$valor%");
        }
    }
}