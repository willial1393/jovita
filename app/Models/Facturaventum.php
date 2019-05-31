<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facturaventum extends Model
{

    protected $table = "facturaventa";
    protected $fillable = [
        "numero",
        "fecha",
        "estado",
        "cliente_id",
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
        return url('/admin/facturaventa/'.$this->getKey());
    }

    
}
