<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Models\Order;
use CodeDelivery\Models\Product;
use CodeDelivery\Models\OrderItem;

class OrderTableSeeder extends Seeder
{

    public function run()
    {
        factory(Order::class,3)->create()->each(function($o){
           for($i = 0; $i < 3; $i++){
               $o->items()->save(factory(OrderItem::class)->make(array(
                   'product_id' => rand(1,5),
                   'qtd' => 2,
                   'price' => 50
               )));
           }
        });
    }

}