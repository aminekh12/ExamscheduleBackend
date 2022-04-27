<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Niveau extends Model
{
    use HasFactory;
    public function filiere(){
        return this->belongsTo('Filiere',"fillieres","id");
    }
    public function matiere(){
        return this->haseMany('Matiere',"Matieres","id");
    }
    public function classe(){
        return this->haseMany('Classe',"classes","id");
    }


}
