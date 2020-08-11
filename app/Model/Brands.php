<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'tbl_brand';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
