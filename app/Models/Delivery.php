<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'delivery';

    protected $fillable = [
        'pickup_address',
        'pickup_name',
        'pickup_phone',
        'pickup_email',
        'delivery_address',
        'delivery_name',
        'delivery_phone',
        'delivery_email',
        'type_of_good',
        'delivery_provider',
        'priority',
        'pickup_date',
        'delivery_time',
    ];
}




