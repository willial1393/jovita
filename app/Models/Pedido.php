<?php namespace App\Models;

use Brackets\AdminAuth\Models\AdminUser;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = "pedido";
    protected $fillable = [
        "admin_users_id",
        "estado",
        "fecha",
        "numeroPedido",
        "proveedor_id",

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

    public function usuario()
    {
        return $this->hasOne(AdminUser::class, 'id', 'admin_users_id');
    }

    public function proveedor()
    {
        return $this->hasOne(Proveedor::class, 'id', 'proveedor_id');
    }

}
