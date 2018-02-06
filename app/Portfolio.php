<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Portfolio extends Model
{
    //
    protected $table = 'portfolios';
    protected $fillable = ['name', 'filter', 'images', 'link'];
}
