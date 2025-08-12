<?php

namespace App\Models\Bendahara;

use App\Models\Auth\AuthModel;
use App\Models\User\DepartemenModel;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'departemen_id',
        'amount',
        'approval_amount',
        'nama_acara',
        'catatan_detail',
        'payment_method',
        'bank_name',
        'bank_account',
        'supporting_file',
        'status',
        'submission_date',
        'date_last',
        'day',
        'is_read'
    ];

    public function departemen()
    {
        return $this->belongsTo(DepartemenModel::class, 'departemen_id');
    }

    public function user()
    {
        return $this->belongsTo(AuthModel::class, 'user_id');
    }
}
