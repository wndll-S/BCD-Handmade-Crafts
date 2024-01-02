<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    }
    protected $fillable = [
        'title',
        'description',
    ];
    public $timestamps = false;
}
