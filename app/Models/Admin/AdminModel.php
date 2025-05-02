<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        '',
        '',
        '',
        ''
    ];
}
