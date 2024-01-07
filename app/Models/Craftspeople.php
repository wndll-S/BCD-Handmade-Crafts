<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Craftspeople extends Model
{
    use HasFactory;
    public function products(): HasMany
    {
        //return $this->hasMany(Products::class);
        return $this->hasMany(Products::class, 'craftspeople_id');
    }
    public $incrementing = false;
    protected $keyType = 'string';

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
