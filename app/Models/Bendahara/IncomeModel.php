<?php

namespace App\Models\Bendahara;

use App\Models\Auth\AuthModel;
use Illuminate\Database\Eloquent\Model;

class IncomeModel extends Model
{
    protected $table = 'income';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'created_by',
        'departemen_id',
        'total',
        'metode',
        'income_date',
        'keterangan',
        'created_at',
        'updated_at'

    ];

    public function user()
    {
    return $this->belongsTo(\App\Models\User::class);
    }

    public function creator()
    {
        return $this->belongsTo(AuthModel::class, 'created_by');
    }

    public function departemen()
    {
        return $this->belongsTo(\App\Models\User\DepartemenModel::class, 'departemen_id');
    }

}
