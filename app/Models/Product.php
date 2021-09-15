<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category'];

    public static function booted()
    {
        static::creating(function (Product $product){
            $product-> slug = strtolower(Str::slug($product->name. '-'. Str::random(6)));
        });

        static::updating(function (Product $product){
            $product-> slug = strtolower(Str::slug($product->name. '-'. Str::random(6)));
        });
    }

    public function getRoutekeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
