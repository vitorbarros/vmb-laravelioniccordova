<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Models\OrderItem;

class OrderItemTableSeeder extends Seeder
{

    public function run()
    {
        factory(OrderItem::class);
    }

}