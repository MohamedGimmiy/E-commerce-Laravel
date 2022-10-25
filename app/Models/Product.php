<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // override it  (none of columns is guarded)
    protected $guarded = [];


    // has one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // has one or many colors
    public function colors()
    {
        return $this->hasMany(Color::class);
    }
}



