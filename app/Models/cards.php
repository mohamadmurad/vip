<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cards extends Model
{
    use HasFactory;

    protected $fillable =[
        'barcode',
        'balance',

    ];


    public function withdraw(){
        return $this->hasMany(Withdrawal::class,'barcode','barcode')->orderBy('id','desc');
    }
}
