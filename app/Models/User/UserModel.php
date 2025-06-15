<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'departemens';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'image',
        'name_divisi',
        'created_at',
        'updated_at'
    ];
}
