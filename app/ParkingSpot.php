<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 10:47
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class ParkingSpot extends Model
{
    protected $table = 'parking_spots';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}