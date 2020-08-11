<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = 'tbl_comment';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
