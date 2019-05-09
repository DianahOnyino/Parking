<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 10:46
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}