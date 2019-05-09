<?php

use App\Item;
use App\Supermarket;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 16:03
 */

class SupermarketItemsTableSeeder extends Seeder
{
    public function run()
    {
        $supermarkets = Supermarket::all();

        $supermarkets->each(function ($supermarket) {
            $supermarket_item = new \App\SupermarketItem();
            $item = Item::first();

            $supermarket_item->supermarket_id = $supermarket->id;
            $supermarket_item->item_id = $item->id;
            $supermarket_item->quantity = 10;

            $supermarket_item->save();
        });
    }
}