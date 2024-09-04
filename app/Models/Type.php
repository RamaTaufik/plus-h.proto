<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    protected $table = "type";

    protected $fillable = [
        'type_name',
    ];

    public function shipping_type(): HasMany
    {
        return $this->hasMany(Shipping_Type::class);
    }
}
