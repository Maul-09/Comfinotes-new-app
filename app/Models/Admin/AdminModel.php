<?php

namespace App\Models\Admin;

use App\Models\User\UserModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = 'users';
    protected static function booted()
    {
        static::addGlobalScope('admin', function(Builder $query){
            $query->where('role', 'admin');
        });
    }

}

