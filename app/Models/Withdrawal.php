<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'amount',
        'date',
        'user_id',
        'orderNo',
    ];

    public function card()
    {
        return $this->belongsTo(cards::class,'barcode','barcode');
    }


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
