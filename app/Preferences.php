<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    protected $table = 'preferences';

    protected $fillable = [
        'user_id', 'theme'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
