<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class People extends Model
{
    //
    protected $table = 'peoples';
    protected $fillable = ['name', 'position', 'text', 'images'];
}
