<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class AuthModel extends Model
{
    protected $table = 'authentication';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        '',
        '',
        '',
        ''
    ];
}
