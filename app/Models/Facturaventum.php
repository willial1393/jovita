<?php namespace App\Models;

use Brackets\AdminAuth\Models\AdminUser;
use Illuminate\Database\Eloquent\Model;

class Facturaventum extends Model
{

    protected $table = "facturaventa";
    protected $fillable = [
        "admin_users_id",
        "cliente_id",
        "estado",
        "fecha",
        "numero",

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
        return url('/admin/facturaventa/'.$this->getKey());
    }


    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }

    public function usuario()
    {
        return $this->hasOne(AdminUser::class, 'id', 'admin_users_id');
    }

}
