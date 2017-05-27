<?php

namespace App\Scope;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ValidScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('is_valid', true);
    }

}