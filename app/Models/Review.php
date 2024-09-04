<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $table = "review";

    protected $fillable = [
        'orders_id',
        'text',
        'rating',
        'time_posted',
        'status',
    ];

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Orders::class);
    }
}
