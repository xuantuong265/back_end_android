<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'tbl_nofitication';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
