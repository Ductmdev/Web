<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'brand_id',
        'product_category_id',
        'name',
        'description',
        'content',
        'price',
        'qty',
        'discount',
        'weight',
        'sku',
        'featured',
        'state', 
        'tag',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, "product_category_id", "id");
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, "brand_id", "id");
    }

    public function productDetail()
    {
        return $this->hasMany(ProductDetail::class, "product_id", "id");
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class, "product_id", "id");
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
