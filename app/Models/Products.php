<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Categories;
class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    public function feedbacks():HasMany
    {
        return $this->hasMany(Feedbacks::class, 'products_id');
        //return $this->hasMany(Products::class, 'craftspeople_id', 'id');
    }
    public function bookmark():HasMany
    {
        return $this->hasMany(Bookmark::class, 'product_id');
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
        'created_at',
    ];
    public $timestamps = false;
}
