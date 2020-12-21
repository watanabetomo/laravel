<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'product_category_id',
        'img',
        'delivery_info',
        'turn',
        'create_user',
        'update_user',
        'delete_flg'
    ];
}
