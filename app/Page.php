<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
	use SoftDeletes, Owned;
    //
    protected $table = 'pages';
    //protected $primaryKey = 'id';
    protected $fillable = ['name', 'alias', 'text', 'images'];

}
