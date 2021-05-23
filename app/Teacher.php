<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{      protected $fillable = [
    "id",
"user_id",
    "master_id"
];

    public $timestamps =false;


public function Master(){
    return $this->belongsTo(Master::class);
}
}
