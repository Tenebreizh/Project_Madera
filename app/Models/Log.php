<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'action_id', 'name', 'description', 'table'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function action()
    {
        return $this->belongsTo('App\Models\Action');
    }

}
