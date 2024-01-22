<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Admin extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;
    protected $table = 'admin';
    protected $fillable = [
        'username',
        'email',
        'password',
        'created_at',
        'updated_at'
    ];
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
