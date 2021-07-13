<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'id', 'id_student', 'master_id'
    ];
    protected $table='inscriptions';
    public $timestamps =false;

}
