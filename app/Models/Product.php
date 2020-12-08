<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'category_id', 'description', 'image'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function products()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
