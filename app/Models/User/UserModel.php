<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        '',
        '',
        '',
        ''
    ];
}
