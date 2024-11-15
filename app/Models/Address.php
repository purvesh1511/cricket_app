<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'fname',
        'lname',
        'address_line_1',
        'address_line_2',
        'country',
        'state',
        'city',
        'zip_code',
        'email',
        'phone'
    ];
}
