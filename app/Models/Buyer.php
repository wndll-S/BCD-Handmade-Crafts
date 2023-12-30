<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    protected $table = 'buyer';
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
        //return $this->hasMany(Products::class, 'craftspeople_id', 'id');
    }
    public function feedbacks()
    {
        return $this->hasMany(Feedbacks::class);
        //return $this->hasMany(Products::class, 'craftspeople_id', 'id');
    }
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'name_ext',
        'password',
        'mobile_number',
        'email',
        'image_url',
    ];
    public $timestamps = false;
}
