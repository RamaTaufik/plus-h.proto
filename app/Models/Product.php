<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;
    // use Searchable;

    protected $table = "product";

    protected $fillable = [
        'product_name',
        'supplier_id',
        'price',
        'stock',
        'desc',
    ];
    
    // public function toSearchableArray()
    // {
    //     return [
    //         'product_name' => '',
    //         'price' => '',
    //         'stock' => '',
    //         'desc' => '',
    //         'tag.tag_name' => '',
    //         'supplier.supplier_name' => '',
    //         'supplier.logo' => '',
    //         'image.img_name_ext' => '',
    //     ];
    // }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function image(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function review(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function product_tag(): HasMany
    {
        return $this->hasMany(Product_Tag::class);
    }
}
