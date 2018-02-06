<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Service extends Model
{
    //
    protected $table = 'services';
    protected $fillable = ['name', 'text', 'icon'];
}
