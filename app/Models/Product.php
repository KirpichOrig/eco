<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'cost', 'image', 'category_id', 'color'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}