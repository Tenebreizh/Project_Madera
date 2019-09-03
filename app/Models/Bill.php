<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'blueprint_number'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
