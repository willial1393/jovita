<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $table = "producto";
    protected $fillable = [
        "codigo",
        "nombre",
        "unidad",
        "precioP",
        "estado",
        "existencia",
        "tipo",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/productos/'.$this->getKey());
    }

    
}
