<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = ['id'];

    public function regions(){
        return $this->hasMany(Region::class);
    }
}
