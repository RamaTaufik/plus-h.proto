<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;

    protected $table = "supplier";

    protected $fillable = [
        'supplier_name',
        'logo',
    ];

    public function supplier_country(): HasMany
    {
        return $this->hasMany(SupplierCountry::class);
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
