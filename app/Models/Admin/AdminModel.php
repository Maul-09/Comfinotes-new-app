<?php

namespace App\Models\Admin;

use App\Models\User\UserModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\AuthModel;
use Illuminate\Database\Eloquent\Builder;

class AdminModel extends AuthModel
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role',
        'image',
        'created_at',
        'updated_at'
    ];

    public function group(){
        return $this->belongsTo(UserModel::class, 'divisi_id');
    }
    protected static function booted()
    {
        static::addGlobalScope('admin', function (Builder $query){
            $query->where('role', 'admin');
        });
    }
}


