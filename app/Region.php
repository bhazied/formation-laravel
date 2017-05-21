<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    protected $guarded = ['id'];

    public function state(){
        return $this->belongsTo(State::class);
    }

}
