<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    public function matiere(){
        return this->hasOne('Niveau',"niveaus","id");
    }
    public function salle(){
        return this->hasOne('Salle',"salles","id");
    }
}

