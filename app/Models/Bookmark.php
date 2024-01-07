<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buyer;
use App\Models\Products;
class Bookmark extends Model
{
    use HasFactory;
    protected $table = 'bookmarks';
    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function buyer(){
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }
    
    
    
}
