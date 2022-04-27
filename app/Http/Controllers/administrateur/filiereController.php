<?php

namespace App\Http\Controllers\administrateur;
use App\Models\Filiere;
use App\Models\Niveau;
use App\Http\Controllers\administrateur\filliereController;
use App\Http\Controllers\administrateur\NiveauController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class filiereController extends Controller
{

    //

    public function insert(Request $req){
        $filiere = new Filiere;
        $filiere->nomfiliere=$req->input("nomfiliere");
        if(!(Filiere::where('nomfiliere','=',$req->input("nomfiliere"))->count()>0)){
            if($filiere->save()){
                return response()->json([
                    "status" => "true"
                ]);
            }
            else
                dd();

        }
        else
        return response()->json(["message" =>"Nom existe dans la base de donnée"]);

    }
    public function getAll(){
        $niveau = Niveau::join('filieres','filieres.id','=','niveau.idfiliere')->get();
        return $niveau;
    }
    public function update(Request $req){

        if((!(Filiere::where('nomfiliere','=',$req->input("nomfiliere"))->count()>0)) && (Filiere::where('id','=',$req->input("id"))->count()>0) ){
            $filiere=Filiere::where('id','=',$req->input("id"))->update(['nomfiliere'=>$req->input("nomfiliere")]);
                return response()->json([
                    "message" => "succés"
                ]);
        }
        else
        return response()->json(["message" =>"Nom existe dans la base de donnée"]);
    }
    public function delete(Request $req){

        if((Filiere::where('id','=',$req->input("id"))->count()>0)){
            $filiere=Filiere::where('id','=',$req->input("id"))->delete();
                return response()->json([
                    "message" => "succés"
                ]);
        }
        else
        return response()->json(["message" =>"il n'y a pas cette enregistrement"]);
    }



}
