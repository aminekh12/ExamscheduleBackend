<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;
    public function professeur(){
        return this->belongsTo('Professeur',"professeurs","id");
    }
    public function niveau(){
        return this->belongsTo('Niveau',"niveaus","id");
    }
    public function examen(){
        return this->belongsTo('Examen',"examens","id");
    }
}
