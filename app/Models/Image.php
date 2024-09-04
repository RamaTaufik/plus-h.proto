<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $table = "image";

    protected $fillable = [
        'product_id',
        'img_type',
        'img_name_ext',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
