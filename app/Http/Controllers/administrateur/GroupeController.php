<?php

namespace App\Http\Controllers\administrateur;
use App\Models\Groupe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    //
    public function insert(Request $req){
        $groupe = new Groupe;
        $groupe->nomgroupe=$req->input("nomgroupe");
        $groupe->nombreetudiant=$req->input("nombreetudiant");
        $groupe->idniveau=$req->input("idniveau");
        if(!(Groupe::where('nomgroupe','=',$groupe->nomgroupe)->count()>0)){ //check if class name already exists
            if($groupe->save()){              //insert into table groupe with a check if it succeed
                return response()->json([
                    "message" => "succés"
                ]);
            }
        }
        else
        return response()->json(["message" =>"Nom existe"]);

    }
    public function getAll(){
        $groupe = Groupe::All();//return all data from table niveau
        return $groupe;
    }
    public function update(Request $req){

        if(Groupe::where('id','=',$req->input("id"))->count()>0){ // check if id exists
            if(!(Groupe::where('nomgroupe','=',$req->input("nomgroupe"))->count()>0)){ // check if nom niveau doesn't exists
                    $groupe=Groupe::where('id','=',$req->input("id"))->update(['nomgroupe'=>$req->input("nomgroupe"),'nombreetudiant'=>$req->input("nombreetudiant"),'id'=>$req->input("idniveau")]);
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

        if((Groupe::where('id','=',$req->input("id"))->count()>0)){
            $groupe=Groupe::where('id','=',$req->input("id"))->delete();
                return response()->json([
                    "message" => "succés"
                ]);
        }
        else
        return response()->json(["message" =>"il n'y a pas cette enregistrement"]);
    }
}
