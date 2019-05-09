<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 15:10
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class SupermarketItem extends Model
{
    protected $table = 'supermarket_items';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}