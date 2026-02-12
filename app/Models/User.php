<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function services() {
        return $this->belongsToMany(Service::class);
    }

    public function blogs() {
        return $this->hasMany(Blog::class);
    }

    public function reviews() {
       return $this->hasMany(Review::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    // Cart
    public function cartProducts()
    {
        return $this->belongsToMany(Product::class, 'cart_product')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    // Favorites
    public function favoriteProducts()
    {
        return $this->belongsToMany(Product::class, 'favorite_product')
                    ->withTimestamps();
    }

    // Compare
    public function compareProducts()
    {
        return $this->belongsToMany(Product::class, 'compare_product')
                    ->withTimestamps();
    }
}