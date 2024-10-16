<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserItemImage extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function item()
    {
        return $this->belongsTo(UserItem::class);
    }
}
