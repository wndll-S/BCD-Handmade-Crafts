<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Craftspeople extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->hasMany(Products::class);
        //return $this->hasMany(Products::class, 'craftspeople_id', 'id');
    }
    protected $table = 'craftspeople';
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'name_ext',
        'password',
        'mobile_number',
        'address',
        'email',
        'image_url',
        'account_status',
    ];
    public $timestamps = false;
}
