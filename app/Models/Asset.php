<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file',
        'industry_id',
        'product_id',
        'asset_type_id',
        'utilization_id',
        'language_id',
        'country_id',
    ];

    // Relationships
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function assetType()
    {
        return $this->belongsTo(AssetType::class);
    }

    public function utilization()
    {
        return $this->belongsTo(Utilization::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
