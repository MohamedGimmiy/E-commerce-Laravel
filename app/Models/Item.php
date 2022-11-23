<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product()
    {
        $this->belongsTo(Product::class);
    }
    public function order()
    {
        $this->belongsTo(Order::class);
    }
    public function color()
    {
        $this->belongsTo(Color::class);
    }
}
