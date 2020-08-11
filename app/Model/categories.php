<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'tbl_categories';
    public $timestamps = true;
    protected $primaryKey = 'id';
}
