<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 10:03
 */

namespace App\Http\Controllers;


use App\ParkingSpot;

class ParkingController extends Controller
{
    public function index()
    {
        return view('parking.display');
    }

    public function getAllAvailableParkingSpots()
    {
        return ParkingSpot::where('occupied', 0)->get();
    }
}