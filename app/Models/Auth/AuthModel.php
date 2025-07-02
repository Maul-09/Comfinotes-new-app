<?php

namespace App\Models\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AuthModel extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'username',
        'email',
        'password',
        'role',
        'image',
        'divisi_id',
        'created_at',
        'updated_at'
    ];

    public function departemen()
    {
        return $this->belongsTo(\App\Models\User\DepartemenModel::class, 'divisi_id');
    }

    public function scopeAdmin($query){
        return $query->where('role', 'admin');
    }

    public function scopeBendahara($query){
        return $query->where('role', 'bendahara');
    }

    public function scopeUser($query){
        return $query->where('role', 'user');
    }

    // Auth

    public function isAdmin(): bool{
        return $this->role === 'admin';
    }

    public function isBendahara(): bool{
        return $this->role === 'bendahara';
    }

    public function isUser(): bool{
        return $this->role === 'user';
    }


}
