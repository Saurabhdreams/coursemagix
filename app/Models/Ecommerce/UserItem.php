<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserItem extends Model
{
    use HasFactory;
    protected $guarded = [];
 
    public function itemContents()
    {
        return $this->hasMany(UserItemContent::class, 'item_id', 'id');
    }

    public function sliders()
    {
        return $this->hasMany(UserItemImage::class, 'item_id', 'id');
    }
    
    public function itemVariations()
    {
        return $this->hasMany(UserItemVariation::class, 'item_id', 'id');
    }
}
