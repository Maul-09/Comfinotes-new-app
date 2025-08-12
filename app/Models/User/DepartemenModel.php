<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DepartemenModel extends Model
{
    protected $table = 'departemens';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'image',
        'name_divisi',
        'key_id',
        'created_at',
        'updated_at'
    ];

    public function users(){
        return $this->hasMany(\App\Models\Auth\AuthModel::class, 'departemen_id');
    }

    public function transactions()
    {
        return $this->hasMany(\App\Models\Bendahara\TransactionModel::class, 'departemen_id');
    }

    protected static function booted(){
        static::creating(function($departemens){
            $departemens->key_id = Str::slug($departemens->name_divisi);
        });
    }
}
