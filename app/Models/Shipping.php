<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shipping extends Model
{
    use HasFactory;

    protected $table = "shipping";

    protected $fillable = [
        'shipping_name',
    ];

    public function shipping_type(): HasMany
    {
        return $this->hasMany(Shipping_Type::class);
    }
}
