<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taxe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'rate',
    ];

    public function quotationLines()
    {
        return $this->hasMany('App\Models\QuotationLine');
    }
}
