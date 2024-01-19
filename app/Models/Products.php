<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    public $incrementing = false;
    protected $keyType = 'string';
    public function feedbacks():HasMany
    {
        return $this->hasMany(Feedbacks::class, 'products_id');
        //return $this->hasMany(Products::class, 'craftspeople_id', 'id');
    }
    public function bookmark():HasMany
    {
        return $this->hasMany(Bookmark::class, 'product_id');
    }
    public function transactions():HasMany
    {
        return $this->hasMany(Transactions::class, 'product_id');
    }
    public function category(){
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function craftspeople(){
        return $this->belongsTo(Craftspeople::class, 'craftspeople_id');
    }
    protected $fillable = [
        'id',
        'craftspeople_id',
        'name',
        'description',
        'image_url',
        'category_id',
        'price',
        'quantity',
        'status',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
}

