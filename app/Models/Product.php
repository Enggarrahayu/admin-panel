<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'description', 'price', 'stock', 'weight', 'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
