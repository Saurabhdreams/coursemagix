<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerWishList extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'item_id'];

    public function item()
    {
        return $this->belongsTo(UserItem::class);
    }
}
