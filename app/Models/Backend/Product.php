<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'bus_name',
        'coach',
        'from',
        'to',
        'price',
        'time',
        'type',
        'counter_point'
    ];
}
