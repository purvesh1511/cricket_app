<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventOrders extends Model
{
    use HasFactory;
    public $table = "event_order";
    public $timestamps = false;
	
    protected $fillable = [
        'order_id',
		'event_id',
        'customer_id',
        'order_amount',
        'order_date',
        'payment_mode',
        'payment_status'
    ];

    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class,'product_id');
    }
}
