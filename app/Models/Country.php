<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $table = "country";

    protected $fillable = [
        'country_name',
    ];

    public function supplier_country(): HasMany
    {
        return $this->hasMany(SupplierCountry::class);
    }
}
