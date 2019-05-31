<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detallepedido extends Model
{

    protected $table = "detallepedido";
    protected $fillable = [
        "consecutivo",
        "cantidad",
        "valorTotal",
        "estado",
        "pedido_id",
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
        return url('/admin/detallepedidos/'.$this->getKey());
    }

    
}
