<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 14:41
 */

namespace App\Http\Controllers;


use App\Supermarket;

class StockTrackingController extends Controller
{
    public function index()
    {
        $supermarkets = Supermarket::all();

        return view('stock.display', compact('supermarkets'));
    }

    public function sellItem($itemId, $supermarketId, $quantity)
    {
//        $supermarket_item =
    }
}