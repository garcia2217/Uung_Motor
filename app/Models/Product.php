<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand_id',
        'image_path',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function motorcycles()
    {
        return $this->hasMany(Motorcycle::class);
    }
}
