<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Order;
use App\Models\Brand;
use App\Models\Review;
use App\Models\Discount;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img_url',
        'description',
        'stock',
        'sold_stock',
        'sku',
        'tags',
        'category_id',
        'brand_id'
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_products')->withPivot('quantity', 'price');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'discounts_products');
    }

    //  public function usersInCart()
    //  {
    //      return $this->belongsToMany(User::class, 'cart_product')
    //                  ->withPivot('quantity')
    //                  ->withTimestamps();
    //  }

    //  public function usersFavorited()
    //  {
    //      return $this->belongsToMany(User::class, 'favorite_product')
    //                  ->withTimestamps();
    //  }

    //  public function usersCompare()
    //  {
    //      return $this->belongsToMany(User::class, 'compare_product')
    //                  ->withTimestamps();
    //  }

}
