<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    protected $fillable = [
        "id",
        "etablissement",

    ];
    public $timestamps =false;
}
