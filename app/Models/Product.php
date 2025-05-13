<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'code',
        'category_id',
        'brand_id',
        'thumbnail',
        'description',
        'price',
        'quantity',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    public function productImages() {
        return $this->hasMany(ProductImage::class);
    }
}
