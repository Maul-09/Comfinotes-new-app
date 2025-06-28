<?php

namespace App\Models\Bendahara;

use App\Models\Auth\AuthModel;
use Illuminate\Database\Eloquent\Builder;

class BendaharaModel extends AuthModel
{
    protected $table = 'users';
    protected static function booted()
    {
        static::addGlobalScope('bendahara', function(Builder $query){
            $query->where('role', 'bendahara');
        });
    }
}
