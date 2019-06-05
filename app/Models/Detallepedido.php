<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detallepedido extends Model
{

    protected $table = 'detallepedido';
    protected $fillable = [
        "cantidad",
        "estado",
        "pedido_id",
        "producto_codigo",
        "valorTotal",
    
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

    public function pedido()
    {
        return $this->hasOne(Pedido::class, 'id', 'pedido_id');
    }

    public function producto()
    {
        return $this->hasOne(Producto::class, 'id', 'producto_codigo');
    }
}
