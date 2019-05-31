<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";

    protected $fillable = [
        "documento",
        "tipoDocumento",
        "nombre",
        "telefono",
        "correo",

    ];

    protected $hidden = [

    ];

    protected $dates = [

    ];


    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/clientes/' . $this->getKey());
    }


}
