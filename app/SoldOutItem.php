<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 15:41
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class SoldOutItem extends Model
{
    protected $table = 'sold_out_items';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}