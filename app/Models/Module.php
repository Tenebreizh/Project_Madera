<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'range_id', 'name', 'description', 'principal_cut', 'cctp', 'marge', 'labor_time', 'price', 'marge_enterprise',
    ];

    public function range()
    {
        return $this->belongsTo('App\Models\Range');
    }

    public function customModules()
    {
        return $this->hasMany('App\Models\CustomModule');
    }

    public function components()
    {
        return $this->belongsToMany('App\Models\Component');
    }
}
