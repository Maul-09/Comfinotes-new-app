<?php

namespace App\Models\Bendahara;

use Illuminate\Database\Eloquent\Model;

class SaldoModel extends Model
{
    protected $table = 'saldo';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'saldo'
    ];
}
