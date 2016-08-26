<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
	use SoftDeletes;

    protected $fillable = [ "url", "type" ];

    protected $dates = ['deleted_at'];


}