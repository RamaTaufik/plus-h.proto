<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    use HasFactory;

    protected $table = "tag";

    protected $fillable = [
        'tag_name',
    ];

    public function product_tag(): HasMany
    {
        return $this->hasMany(Product_Tag::class);
    }
}
