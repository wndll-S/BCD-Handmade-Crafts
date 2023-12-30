<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    public function feedbacks()
    {
        return $this->hasMany(Feedbacks::class);
        //return $this->hasMany(Products::class, 'craftspeople_id', 'id');
    }
    public function bookmark()
    {
        return $this->hasMany(Bookmark::class);
        //return $this->hasMany(Products::class, 'craftspeople_id', 'id');
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
