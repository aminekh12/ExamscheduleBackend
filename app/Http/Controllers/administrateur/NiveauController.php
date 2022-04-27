<?php

namespace App\Http\Controllers\administrateur;


use App\Http\Controllers\Controller;
use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    //
    public function insert(Request $req){
        $niveau = new Niveau;
        $niveau->nomniveau=$req->input("nomniveau");
        $niveau->idfiliere=$req->input("idfiliere");
        if(!(Niveau::where('nomniveau','=',$req->input("nomniveau"))->count()>0)){
            if($niveau->save()){
                return response()->json([
                    "message" => "succés"
                ]);
            }
        }
        else
        return response()->json(["message" =>"Nom existe"]);

    }
    public function getAll(){
        $niveau = Niveau::All()->get();
        return $niveau;
    }
    public function update(Request $req){

        if(!(Niveau::where('nomniveau','=',$req->input("nomniveau"))->count()>0) && Niveau::where('id','=',$req->input("id"))->count()>0){
            $niveau=Niveau::where('id','=',$req->input("id"))->update(['nomniveau'=>$req->input("nomniveau"),'id'=>$req->input("idniveau")]);
                return response()->json([
                    "message" => "succés"
                ]);
        }
        else
        return response()->json(["message" =>"Nom existe"]);
    }
    public function delete(Request $req){

        if((Niveau::where('id','=',$req->input("id"))->count()>0)){
            $niveau=Niveau::where('id','=',$req->input("id"))->delete();
                return response()->json([
                    "message" => "succés"
                ]);
        }
        else
        return response()->json(["message" =>"il n'y a pas cette enregistrement"]);
    }

}
