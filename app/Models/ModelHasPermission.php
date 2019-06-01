<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelHasPermission extends Model
{


    protected $fillable = [
        "permission_id",
        "model_type",
        "model_id",

    ];

    protected $hidden = [

    ];

    protected $dates = [

    ];


    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/model-has-permissions/' . $this->getKey());
    }

    public function rol()
    {
        return $this->hasOne(Role::class, 'id', 'model_id');
    }

    public function permiso()
    {
        return $this->hasOne(Permission::class, 'id', 'permission_id');
    }

}
