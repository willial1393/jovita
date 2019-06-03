<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalleventum extends Model
{

    protected $table = 'detalleventa';
    protected $fillable = [
        "cantidad",
        "estado",
        "facturaVenta_id",
        "PrecioUnidad",
        "producto_codigo",
        "totalVenta",
    
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
