<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SocialPeople extends Model
{
    //
    protected $table = 'socialpeoples1';
    protected $fillable = ['name', 'link', 'callBack'];
}
