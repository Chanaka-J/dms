<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'package';

    protected $fillable = [
        'Package_description',
        'length',
        'height',
        'width',
        'weight',
        'delivery_id',
    ];

  
    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
