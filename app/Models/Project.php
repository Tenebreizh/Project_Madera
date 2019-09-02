<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'user_id', 'state_id', 'name', 'description', 'reference',
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function bills()
    {
        return $this->hasMany('App\Models\Bill');
    }

    public function blueprints()
    {
        return $this->hasMany('App\Models\Blueprint');
    }

    public function quotations()
    {
        return $this->hasMany('App\Models\Quotation');
    }
}
