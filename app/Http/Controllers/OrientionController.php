<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class OrientionController extends Controller
{
    public function getOrientation(Request $request){

        $reseau = 0;
        $dev = 0;
        $last_index = count($request->liste_matiere) - 1;
        

        for ($i = 0; $i <= $last_index; $i++) {
            $matiere = Matiere::with("categorie")->where("label", "=", $request->liste_matiere[$i])->get();
            $categorie = $matiere[0]->categorie->label;
            if($categorie === "Dev"){
                $dev  += 1;
            }elseif($categorie === "Reseau"){
                $reseau += 1;
            }
        }

        $pourcentage_GB = ($dev / ($dev + $reseau)) * 100;
        $pourcentage_SR = 100 - $pourcentage_GB;
        
        if($reseau > $dev){

            return [
                "GB" => number_format($pourcentage_GB, 2),
                "SR" => number_format($pourcentage_SR, 2)
            ];

        } else {

            return [
                "GB" => number_format($pourcentage_GB, 2),
                "SR" => number_format($pourcentage_SR, 2)
            ];

        }   
        
        
    }
}
