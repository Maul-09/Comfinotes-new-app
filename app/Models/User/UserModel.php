<?php

namespace App\Models\User;

use App\Models\Auth\AuthModel;
use Illuminate\Database\Eloquent\Builder;

class UserModel extends AuthModel
{
    protected $table = 'users';
    protected static function booted()
    {
        static::addGlobalScope('user', function(Builder $query){
            $query->where('role', 'user');
        });
    }

}
