<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buyer;
class Bookmark extends Model
{
    use HasFactory;
    public function buyer(){
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }
    
}
