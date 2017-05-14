<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    
     public $table = 'test';

    public $fillable = ['*'];
    

    public function  getRouteKeyName()
    {
        return 'name';
    }

}
