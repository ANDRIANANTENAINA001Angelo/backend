<?php

namespace App\Http\Controllers;

use App\Models\Question as Questionnaire;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function basic(Questionnaire $question){
        return response()->json($question->reponse()->get());
    }

    public function avance(Request $request){
        $questions= Questionnaire::all();
        $reponse= "";
        $data = mb_strtolower($request->data, 'UTF-8');

        // Remplacer les caractères accentués par leurs équivalents non accentués
        $caracteresAccentues = array('à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
        $caracteresNonAccentues = array('a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
            
        $data = str_replace($caracteresAccentues, $caracteresNonAccentues, $data);

        foreach ($questions as $question) {
            $mot_cle= mb_strtolower($question->mmot_cle);
            $mot_cle= str_replace($caracteresAccentues, $caracteresNonAccentues, $mot_cle);

            if ($data == $question->mot_cle || Str::contains($data, $question->mot_cle)){
                $reponse= $question->response()->get();
                return response()->json($reponse);
            }
            
        }
            return response()->json("Je n'ai pas encore cette information!");

        
    }
}
