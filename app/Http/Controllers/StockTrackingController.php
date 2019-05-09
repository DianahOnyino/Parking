<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 14:41
 */

namespace App\Http\Controllers;


use App\SoldOutItem;
use App\Supermarket;
use App\SupermarketItem;

class StockTrackingController extends Controller
{
    public function index()
    {
        $supermarkets = Supermarket::all();

        return view('stock.display', compact('supermarkets'));
    }

    public function sellItem($itemId, $supermarketId, $quantity)
    {
        $supermarket_item = SupermarketItem::where('item_id', $itemId)->where('supermarket_id', $supermarketId)
                                                                      ->first();
        if (!$supermarket_item) {
            return [
                'error_message' => 'No record found!'
            ];
        }

        $supermarket_item_quantity = $supermarket_item->quantity;
        $requested_quantity = $quantity;

        if ($supermarket_item_quantity < $requested_quantity) {
            return [
                'error_message' => "Cannot sell, there are no enough items in stock! Only 
                $supermarket_item_quantity items are available!"
            ];
        }

        $supermarket_item->quantity = $supermarket_item_quantity - $requested_quantity;
        $supermarket_item_quantity->sold_out_quantity = $requested_quantity;
        $supermarket_item_quantity->save();

        $sold_out_item = new SoldOutItem();

        $sold_out_item->item_id = $itemId;
        $sold_out_item->supermarket_id = $supermarketId;
        $sold_out_item->quantity = $requested_quantity;

        $sold_out_item->save();

        return [
            'success_message' => 'Successfully sold out the requested item quantity!'
        ];
    }

    public function checkBalance($itemId, $supermarketId)
    {
        $supermarket_item = SupermarketItem::where('item_id', $itemId)->where('supermarket_id', $supermarketId)
                                           ->first();

        return [
            "supermarket_item_balance" => $supermarket_item->quantity
        ];
    }

    public function returnItem($soldOutItemId)
    {
        $sold_out_item = SoldOutItem::find($soldOutItemId);

        if ($sold_out_item) {
            $supermarket_item = SupermarketItem::where('supermarket_id', $sold_out_item->supermarket_id)
                                               ->where('item_id', $sold_out_item->item_id)->first();

            $supermarket_item->quantity = $sold_out_item->quantity + $supermarket_item->quantity;

            $supermarket_item->save();

            return [
                'success_message' => 'Item successfully returned to stock!'
            ];
        }
    }
}