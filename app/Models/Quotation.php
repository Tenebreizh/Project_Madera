<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'quotation_number', 'active',
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function quotationLines()
    {
        return $this->hasMany('App\Models\QuotationLine');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
