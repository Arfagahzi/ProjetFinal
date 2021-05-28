<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    protected $fillable = [
        "id",
        "universite",

    ];
    public $timestamps =false;
}
