<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city', 'country', 'firstname', 'lastname', 'street', 'street_number', 'zipcode', 'email', 'phone'
    ];

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }
}
