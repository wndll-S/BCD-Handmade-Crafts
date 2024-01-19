<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Craftspeople extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;
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
        'created_at'
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
