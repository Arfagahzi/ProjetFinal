<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $fillable = [
        "id",
       "title",
        "type",
        "detail",
        "image"
    ];
    public $timestamps =false;

    ////relations


    public  function teachers(){
        // foreign jey user -> master
      return $this->hasMany(User::class)  ;
    }

    public function critere(){
        return $this->hasMany(Critere::class);
    }
}
