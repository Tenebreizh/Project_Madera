<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomModule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'module_id', 'label', 'description', 'specification', 'price', 'commercial_marge',
    ];

    public function module()
    {
        return $this->belongsTo('App\Models\Module');
    }

    public function quotationLines()
    {
        return $this->hasMany('App\Models\QuotationLine');
    }
}
