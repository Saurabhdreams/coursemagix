<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;
    
    public function orderitems()
    {
        return $this->hasMany(UserOrderItem::class);
    }
}
