<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $fillable = [
        "id",
       "title",
        "type",
        "detail"
    ];
    public $timestamps =false;

    ////relations
    public  function teachers(){
      return $this->hasMany(Teacher::class)  ;
    }
}
