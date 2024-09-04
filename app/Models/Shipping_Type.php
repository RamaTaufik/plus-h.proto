<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipping_Type extends Model
{
    use HasFactory;

    protected $table = "shipping_type";

    protected $fillable = [
        'shipping_id',
        'type_id',
        'shipping_price',
        'time_minute',
    ];

    public function shipping(): BelongsTo
    {
        return $this->belongsTo(Shipping::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
