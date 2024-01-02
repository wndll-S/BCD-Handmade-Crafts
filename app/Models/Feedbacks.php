<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feedbacks extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    public function buyer(){
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }
    public function product(){
        return $this->belongsTo(Products::class, 'products_id');
    }
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
