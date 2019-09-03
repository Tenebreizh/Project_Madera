<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'street', 'street_number', 'zipcode', 'city', 'country', 'phone', 'fax', 'email',
    ];

    public function components()
    {
        return $this->belongsToMany('App\Models\Component');
    }
}
