<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'tbl_products';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
