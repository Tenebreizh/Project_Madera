<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Covering extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'description', 'reference',
    ];

    public function ranges()
    {
        return $this->hasMany('App\Models\Range');
    }
}
