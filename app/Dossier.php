<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $fillable = [
        "id",
        "id_user",
        "nbr_redoublement"  ,
        "Annee_bac" ,
        "bac" ,
        "reo" ,
        "moyenne_bac",
        "nom_diplome",
        "date_diplome",
        "img_diplome",
        "pays",
        "img_cin",
        ];
public $timestamps =false;
}
