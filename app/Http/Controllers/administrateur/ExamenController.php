<?php

namespace App\Http\Controllers\administrateur;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    //
    public function insert(Request $req){
        $examen = new Examen;
        $examen->date=$req->input("date");
        $examen->heure=$req->input("heure");
        $examen->idmatiere=$req->input("idmatiere");
        $examen->idsalle=$req->input("idsalle");
        if($examen->save()){
                return response()->json([
                    "message" => "succés"
                ]);
            }

        else
        return response()->json(["message" =>"erreur"]);

    }
    public function getAll(){
        $examen = Examen::All()->get();
        return $examen;
    }
    public function update(Request $req){

        if(Examen::where('id','=',$req->input("id"))->count()>0){
            $examen=Examen::where('id','=',$req->input("id"))->update(['date'=>$req->input("date"),'heure'=>$req->input("heure"),'idmatiere'=>$req->input("idmatiere"),'idsalle'=>$req->input("idsalle")]);
                return response()->json([
                    "message" => "succés"
                ]);
        }
        else
        return response()->json(["message" =>"n'existe pas"]);
    }
    public function delete(Request $req){

        if((Examen::where('id','=',$req->input("id"))->count()>0)){
            $examen=Examen::where('id','=',$req->input("id"))->delete();
                return response()->json([
                    "message" => "succés"
                ]);
        }
        else
        return response()->json(["message" =>"il n'y a pas cette enregistrement"]);
    }

}
