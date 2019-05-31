<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productoproveedor extends Model
{

    protected $table = "productoproveedor";
    protected $fillable = [
        "producto_id",
        "ofreProveedor_id",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/productoproveedors/'.$this->getKey());
    }

    
}
