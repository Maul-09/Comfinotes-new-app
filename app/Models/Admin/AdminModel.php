<?php

namespace App\Models\Admin;

use App\Models\Auth\AuthModel;
use Illuminate\Database\Eloquent\Builder;

class AdminModel extends AuthModel
{
    protected $table = 'users';
    protected static function booted()
    {
        static::addGlobalScope('admin', function (Builder $query){
            $query->where('role', 'admin');
        });
    }
}


