<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orders extends Model
{
    use HasFactory;
    public $table = "orders";
    public $timestamps = false;
	
    protected $fillable = [
        'order_id',
        'customer_id',
        'slot_date',
        'slot_id',
        'lane_id',
        'lane_price',
        'payment_mode',
		'created_by',
        'created_at',
        'updated_at'
    ];

    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class,'product_id');
    }
}
