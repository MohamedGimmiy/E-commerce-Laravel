<?php

namespace App\Models;


class Cart
{
    public function centsToPrice($cents)
    {
        return number_format($cents/100, 2);
    }
    public static  function unitPrice($item)
    {
        // when you want to call public method from a static method
        return (new self)->centsToPrice($item['product']['price']) * $item['quantity'];
    }
    public static function totalAmount()
    {
        $total = 0;
        if(session()->has('cart')){

            foreach(session('cart') as $item){
                // when you call static method from a static method
                $total += self::unitPrice($item);
            }
            return $total;
        }
        return 0;
    }
}
