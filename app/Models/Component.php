<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'component_type_id', 'name', 'description',
    ];

    public function componentType()
    {
        return $this->belongsTo('App\Models\ComponentType');
    }

    public function modules()
    {
        return $this->belongsToMany('App\Models\Module');
    }

    public function suppliers()
    {
        return $this->belongsToMany('App\Models\Supplier');
    }
}
