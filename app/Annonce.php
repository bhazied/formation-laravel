<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $table = 'annonces';

    protected  $guarded = ['id'];
    
    public function category(){
        return $this->belongsTo(\App\Category::class);
    }
}
