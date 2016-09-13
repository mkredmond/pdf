<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = ['path', 'url'];

    protected $dates = ['created_at', 'updated_at'];

    public $incrementing = false;

}
