<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $fillable = [
        "id",
        "inscrit_id",
                "nbr_redoublement"  ,
        "Annee_bac" ,
        "bac" ,
        "reo" ,
        "moyenne_bac",
        "nom_diplome",
        "date_diplome",
        "img_diplome",
        "certificat_succee_bac",
        "session_bac",
        "mention_bac",
        "nature_diplome",
        "img_cin_face1",
        "img_cin_face2",
        "img_reo",
        ];
//    public function Student(){
//        return $this->BelongsTo(User::class);
//    }
public $timestamps =false;
}
