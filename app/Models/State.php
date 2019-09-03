<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'description',
    ];

    public function countries()
    {
        return $this->hasMany('App\Models\Country');
    }

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }
}
