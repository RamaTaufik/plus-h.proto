<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orders extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $attribute = [
        'status' => 'preparing',
    ];

    protected $fillable = [
        'user_id',
        'product_id',
        'qty',
        'city_id',
        'address',
        'shipping_type_id',
        'payment_method_id',
        'time_ordered',
        'status',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }
}
