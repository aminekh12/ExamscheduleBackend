<?php

namespace App\Http\Controllers\administrateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;

class SalleController extends Controller
{
    //

    public function insert(Request $req){
        $salle = new Salle;
        $salle->nomsalle=$req->input("nomsalle");
        $salle->etagesalle=$req->input("etagesalle");
        $salle->typesalle=$req->input("typesalle");
        $salle->nombreplaces=$req->input("nombreplaces");
        if(!(Salle::where('nomsalle','=',$req->input("nomsalle"))->count()>0)){
            if($salle->save()){
                return response()->json([
                    "message" => "succés"
                ]);
            }
        }
        else
        return response()->json(["message" =>"Nom existe"]);

    }
    public function getAll(){
        $salle = Salle::All()->get();
        return $salle;
    }
    public function update(Request $req){

        if(!(Salle::where('nomsalle','=',$req->input("nomsalle"))->count()>0) && Salle::where('id','=',$req->input("id"))->count()>0){
            $salle=Salle::where('id','=',$req->input("id"))->update(['nomsalle'=>$req->input("nomsalle"),'etagesalle'=>$req->input("etagesalle"),'typesalle'=>$req->input("typesalle"),'nombreplaces'=>$req->input("nombreplaces")]);
                return response()->json([
                    "message" => "succés"
                ]);
        }
        else
        return response()->json(["message" =>"Nom existe"]);
    }
    public function delete(Request $req){

        if((Salle::where('id','=',$req->input("id"))->count()>0)){
            $salle=Salle::where('id','=',$req->input("id"))->delete();
                return response()->json([
                    "message" => "succés"
                ]);
        }
        else
        return response()->json(["message" =>"il n'y a pas cette enregistrement"]);
    }
}
