<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'order_id',
        'type',
        'first_name',
        'last_name',
        'street_address',
        'city',
        'state',
        'postal_code',
        'country',
        'phone_number',
        'email',
    ];
}
