<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = "pedido";
    protected $fillable = [
        "numeroPedido",
        "estado",
        "fecha",
        "proveedor_id",
        "usuario_id",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "fecha",
    
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/pedidos/'.$this->getKey());
    }

    
}
