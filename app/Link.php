<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;

    protected $fillable = ["url", "type"];

    protected $dates = ['deleted_at'];

    public static function rolloverLink($templateYear, $link)
    {
        $link->url = str_replace($templateYear, ($templateYear + 1), $link->url);
        $link->url = str_replace(($templateYear - 1), $templateYear, $link->url);
        $l = new static();

        $l->url        = $link->url;
        $l->type       = $link->type;
        $l->start_year = $templateYear;
        $l->end_year   = $templateYear + 1;

        $l->save();
    }
}
