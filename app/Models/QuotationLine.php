<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationLine extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'custom_module_id', 'quotation_id', 'taxe_id', 'name', 'description', 'price', 'quantity'
    ];

    public function customModule()
    {
        return $this->belongsTo('App\Models\CustomModule');
    }

    public function quotation()
    {
        return $this->belongsTo('App\Models\Quotation');
    }

    public function taxe()
    {
        return $this->belongsTo('App\Models\Taxe');
    }
}
