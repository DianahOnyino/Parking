<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 14:59
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Supermarket extends Model
{
    protected $table = 'supermarkets';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}