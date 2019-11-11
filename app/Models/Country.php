<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
}
