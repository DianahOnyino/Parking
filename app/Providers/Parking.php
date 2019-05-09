<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 10:48
 */

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $table = 'parking';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}