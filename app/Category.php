<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{

    protected  $table = 'categories';
    

    protected  $guarded = ['id'];
    

    public function annonces(){
        return $this->hasMany(\App\Annonce::class);
    }
}
