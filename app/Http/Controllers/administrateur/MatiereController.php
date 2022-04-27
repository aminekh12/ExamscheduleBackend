<?php

namespace App\Http\Controllers\administrateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    //
    public function insert(Request $req){
        $matiere = new Matiere;
        $matiere->matiere=$req->input("nommatiere");
        $matiere->typesalle=$req->input("typesalle");
        $matiere->idprofesseur=$req->input("idprofesseur");
        $matiere->idniveau=$req->input("idniveau");
        if(!(Matiere::where('matiere','=',$matiere->matiere)->count()>0)){ //check if matiere name already exists
            if($matiere->save()){              //insert into table matiere with a check if it succeed
                return response()->json([
                    "message" => "succés"
                ]);
            }
        }
        else
        return response()->json(["message" =>"Nom existe"]);

    }
    public function getAll(){
        $matiere = Matiere::All();//return all data from table matiere
        return $matiere;
    }
    public function update(Request $req){

        if(Matiere::where('id','=',$req->input("id"))->count()>0){ // check if id exists
            if(!(Matiere::where('matiere','=',$req->input("matiere"))->count()>0)){ // check if name matiere doesn't exists
                    $matiere=Matiere::where('id','=',$req->input("id"))->update(['matiere'=>$req->input("matiere"),'typsalle'=>$req->input("typesalle"),'id'=>$req->input("idprofesseur"),'id'=>$req->input("idniveau")]);
                    return response()->json([
                        "message" => "succés"
                    ]);
                }
                return response()->json(["message" =>"nom niveau existe"]);

        }
        else
        return response()->json(["message" =>"id n'existe pas"]);
    }
    public function delete(Request $req){

        if((Matiere::where('id','=',$req->input("id"))->count()>0)){
            $matiere=Matiere::where('id','=',$req->input("id"))->delete();
                return response()->json([
                    "message" => "succés"
                ]);
        }
        else
        return response()->json(["message" =>"il n'y a pas cette enregistrement"]);
    }
}
