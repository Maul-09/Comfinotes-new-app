<?php

namespace App\Models\Admin;

use App\Models\User\UserModel;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
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
}
