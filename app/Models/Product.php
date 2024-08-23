<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'description', 'photo', 'price', 'date'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Mengisi nama dan foto kategori secara otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if ($product->category) {
                $product->name = $product->category->name; // Set nama dari kategori
                $product->photo = $product->category->photo; // Set foto dari kategori
            }
        });
    }
}
