<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 10:03
 */

namespace App\Http\Controllers;


use App\ParkingSpot;
use App\Vehicle;
use http\Env\Request;
use Illuminate\Support\Facades\Input;

class ParkingController extends Controller
{
    public function index()
    {
        $parkingLotStartNo = ParkingSpot::where('occupied', 0)->orderBY('number', 'ASC')->first()->number;

        return view('parking.display', compact('parkingLotStartNo', $parkingLotStartNo));
    }

    public function getAllAvailableParkingSpots()
    {
        return ParkingSpot::where('occupied', 0)->get();
    }

    public function getNextAvailableParkingSpot($vehicleType)
    {
        $vehicle_type_slug = Vehicle::where('type', $vehicleType)->first()->slug;

        if ($vehicle_type_slug == 'car') {
            $current_parking_slot = ParkingSpot::where('occupied', 0)->orderBY('number', 'ASC')->first();

            $next_available_parking_slot = ParkingSpot::where('number', '>', $current_parking_slot->number)
                                                      ->min('number')->first();
        } elseif($vehicle_type_slug == 'motorbike') {
            $current_parking_slot = ParkingSpot::where('occupied', 0)->orderBY('number', 'ASC')->first();

            $next_available_parking_slot = $current_parking_slot;
        } elseif ($vehicle_type_slug == 'bus') {
            $current_parking_slot = ParkingSpot::where('occupied', 0)->orderBY('number', 'ASC')
                                                                     ->take(3)->pluck('number')->get()->toArray();

            $third_slot = ParkingSpot::where('number', max($current_parking_slot))->first();

            $next_available_parking_slot = ParkingSpot::where('number', '>', $third_slot->number)
                                                      ->min('number')->first();
        } else {
            $current_parking_slot = ParkingSpot::where('occupied', 0)->orderBY('number', 'ASC')
                                               ->take(5)->pluck('number')->get()->toArray();

            $fifth_slot = ParkingSpot::where('number', max($current_parking_slot))->first();

            $next_available_parking_slot = ParkingSpot::where('number', '>', $fifth_slot->number)
                                                      ->min('number')->first();
        }

        return $next_available_parking_slot;
    }

    public function getAvailableParkingSpotWithLowestNumber()
    {
        return ParkingSpot::where('occupied', 0)->orderBY('number', 'ASC')->first();
    }

    public function park($parkingLotStartNo)
    {
        $input = Input::all();

        $vehicle_type_slug = Vehicle::where('type', $input['vehicle_type'])->first()->slug;
        $current_parking_slot = ParkingSpot::where('number', $parkingLotStartNo)->first();

        if ($vehicle_type_slug == 'car') {
            $current_parking_slot->occupied = 1;
            $current_parking_slot->save();
        } elseif($vehicle_type_slug == 'motorbike') {
            //TODO: Check if there are existing motorcycles and park under the space if the motorcycles are not yet 5
            $current_parking_slot->occupied = 1;
            $current_parking_slot->save();
        } elseif ($vehicle_type_slug == 'bus') {
            $current_parking_slot = ParkingSpot::where('number', '>=', $parkingLotStartNo)->orderBY('number', 'ASC')
                                               ->take(3)->get();

            $current_parking_slot->each(function ($parking_slot) {
                $parking_slot->occupied = 1;
                $parking_slot->save();
            });
        } else {
            $current_parking_slot = ParkingSpot::where('number', '>=', $parkingLotStartNo)->orderBY('number', 'ASC')
                                               ->take(5)->get();

            $current_parking_slot->each(function ($parking_slot) {
                $parking_slot->occupied = 1;
                $parking_slot->save();
            });
        }

        return redirect()->with('success', 'Vehicle successfully parked!');
    }
}