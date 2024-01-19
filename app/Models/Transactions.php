<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Buyer;
class Transactions extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    public $incrementing = true;
    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function buyers()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }
    protected $fillable = [
        'transaction_id',
        'buyer_id',
        'product_id',
        'total_quantity',
        'total_amount',
        'payment_method',
        'shipping_address',
        'status',
        'created_at',
        'updated_at'
    ];
}
