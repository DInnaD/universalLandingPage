<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Logo extends Model
{
    //
    protected $table = 'logos1';
    protected $fillable = ['name', 'favicons', 'images'];
}
