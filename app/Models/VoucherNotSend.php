<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherNotSend extends Model
{
    use HasFactory;

    protected $fillable =[
        'phone',
        'amount',
        'sms_not_sent'
    ];
}
