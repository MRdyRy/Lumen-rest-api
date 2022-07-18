<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class ProductModel extends Model 
{

    protected $table = 'product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'productName', 'price','desc','type','qty','createBy','updateBy','isActive'
    ];

}
