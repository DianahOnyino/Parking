<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 14:41
 */

namespace App\Http\Controllers;


class StockTrackingController extends Controller
{
    public function index()
    {
        return view('stock.display');
    }
}