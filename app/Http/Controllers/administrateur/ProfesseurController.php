<?php

namespace App\Http\Controllers\administrateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professeur;

class ProfesseurController extends Controller
{
    //
    public function insert(Request $req){
            $professeur = new Professeur;
            $professeur->nom=$req->input("nom");
            $professeur->prenom=$req->input("prenom");
            if((Professeur::where('nom','=',$professeur->nom)->count()>0)){ //check if first name and last name doesn't exists
                $msg="Nom professeur existe mais il est souvegarder";
            }
            else
              $msg="succés";
            if($professeur->save()){              //insert into table Professur with a check if it succeed
                return response()->json([
                    "message" => $msg
                ]);
            }
            return response()->json([
                "message" => "erreur"
            ]);

        }
        public function getAll(){
            $professeur = Professeur::All();//return all data from table professeur
            return $professeur;
        }
        public function update(Request $req){

            if(Professeur::where('id','=',$req->input("id"))->count()>0){ // check if id exists
                if(!(Professeur::where('nom','=',$req->input("nom"))->count()>0) && (!(Professeur::where('nom','=',$req->input("nom"))->count()>0))){ // check if first name and last name of professeur doesn't exists
                        $professeur=Professeur::where('id','=',$req->input("id"))->update(['nom'=>$req->input("nom"),'prenom'=>$req->input("prenom")]);
                        return response()->json([
                            "message" => "succés"
                        ]);
                    }
                    return response()->json(["message" =>"nom et prenom professeur existe"]);

            }
            else
            return response()->json(["message" =>"id n'existe pas"]);
        }
        public function delete(Request $req){

            if((Professeur::where('id','=',$req->input("id"))->count()>0)){
                $professeur=Professeur::where('id','=',$req->input("id"))->delete();
                    return response()->json([
                        "message" => "succés"
                    ]);
            }
            else
            return response()->json(["message" =>"il n'y a pas cette enregistrement"]);
        }

}
