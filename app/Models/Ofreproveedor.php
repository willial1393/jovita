<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ofreproveedor extends Model
{

    protected $table = 'ofreproveedor';
    protected $fillable = [
        "descuento",
        "estado",
        "identificacion",
        "producto_id",
        "precio",
        "proveedor_id",
        "unidad",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/ofreproveedors/'.$this->getKey());
    }


    public function proveedor()
    {
        return $this->hasOne(Proveedor::class, 'id', 'proveedor_id');
    }

    public function producto()
    {
        return $this->hasOne(Producto::class, 'id', 'producto_id');
    }
    
}
