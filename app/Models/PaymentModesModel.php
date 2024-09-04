<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModesModel extends Model
{
    use HasFactory;

    protected  $table = "payment_modes";
    protected $primaryKey = "id";
    protected $fillable = [
        "code","description","type"
    ];
    protected $connection = 'mysql';
    public $incrementing = false;

    public function scopePaymentList(){

        $list = PaymentModesModel::get();
        return $list;
    }
}
