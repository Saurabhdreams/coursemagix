<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrderItem extends Model
{
    use HasFactory;
    public function item() {
        return $this->belongsTo(UserItem::class);
    }
}
