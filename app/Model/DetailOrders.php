<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailOrders extends Model
{
    protected $table = 'tbl_detailOrders';
    public $timestamps = true;
    protected $primaryKey = 'id';
}
