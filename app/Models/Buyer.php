<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Buyer extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;
    protected $table = 'buyer';
    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class, 'buyer_id');
        //return $this->hasMany(Products::class, 'craftspeople_id', 'id');
    }
    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedbacks::class, 'buyer_id');
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
        'created_at',
    ];
    public $timestamps = false;
    public function getAuthIdentifierName()
    {
        return 'id'; // Assuming your primary key is 'id'
    }
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    public function getAuthPassword()
    {
        return $this->password;
    }
}
