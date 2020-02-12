<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'covering_id', 'insulator_id', 'external_finition_id', 'window_frame_id', 'label', 'description','reference', 'rule',
    ];

    public function covering()
    {
        return $this->belongsTo('App\Models\Covering');
    }

    public function insulator()
    {
        return $this->belongsTo('App\Models\Insulator');
    }

    public function externalFinition()
    {
        return $this->belongsTo('App\Models\ExternalFinition');
    }

    public function windowFrame()
    {
        return $this->belongsTo('App\Models\WindowFrame');
    }

    public function modules()
    {
        return $this->hasMany('App\Models\Module');
    }
}
