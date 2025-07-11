<?php

namespace App\Models\Bendahara;

use App\Models\Auth\AuthModel;
use Illuminate\Database\Eloquent\Model;

class ExpensesModel extends Model
{
    protected $table = 'expenses';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'created_by',
        'departemen_id',
        'jumlah',
        'kategori',
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
        return $this->belongsTo(\App\Models\User\DepartemenModel::class);
    }
}
