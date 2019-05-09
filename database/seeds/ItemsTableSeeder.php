<?php

use App\Item;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 16:00
 */

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Item::create([
                'quantity' => 100,
                're_order_level' => 10,
                             ]);
        }
    }
}