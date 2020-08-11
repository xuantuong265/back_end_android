<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'tbl_orders';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
