<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalleventum extends Model
{

    protected $table = "detalleventa";
    protected $fillable = [
        "consecutivo",
        "totalVenta",
        "cantidad",
        "PrecioUnidad",
        "estado",
        "facturaVenta_id",
        "producto_codigo",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/detalleventa/'.$this->getKey());
    }

    
}
