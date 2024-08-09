<?php

namespace App\Models;


use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vourchers extends Model
{
    use HasFactory, AsSource;

    protected $fillable =[
        'vourcher',
        'amount',
        'status',
        'user_assigned'
    ];


}
