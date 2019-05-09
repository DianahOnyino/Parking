<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 14:41
 */

namespace App\Http\Controllers;


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
                'error_message' => 'Cannot sell, there are no enough items in stock!'
            ];
        }

        $supermarket_item->quantity = $supermarket_item_quantity - $requested_quantity;
        $supermarket_item_quantity->save();

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
}