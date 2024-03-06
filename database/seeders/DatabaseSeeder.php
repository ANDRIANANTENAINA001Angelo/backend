<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'nom' => "ANDRIANANTENAINA",
            'prenom' => "Angelo",
            'email' => "morningstar25@gmail.com",
            "adresse"=> "Tanambao",
            "matricule"=>"2322",
            'email_verified_at' => now(),
            'password' => Hash::make('root'),
            'remember_token' => Str::random(10),
        ]);

        $dev=\App\Models\Categorie::factory()->create([
            "label"=> "Dev"
        ]);
        $reseau= \App\Models\Categorie::factory()->create([
            "label"=> "Reseau"
        ]);

        $metionInfo= \App\Models\Mention::factory()->create([
            "label"=>"Informatique"
        ]);

        $mentionIA= \App\Models\Mention::factory()->create([
            "label"=>"Intelligence Artificielle"
        ]);

        \App\Models\Parcours::factory()->create([
            "label"=>"GB",
            "mention_id"=>$metionInfo->id
        ]);

        \App\Models\Parcours::factory()->create([
            "label"=>"SR",
            "mention_id"=>$metionInfo->id
        ]);

        \App\Models\Parcours::factory()->create([
            "label"=>"IG",
            "mention_id"=>$metionInfo->id
        ]);

        \App\Models\Parcours::factory()->create([
            "label"=>"GID",
            "mention_id"=>$mentionIA->id
        ]);

        \App\Models\Parcours::factory()->create([
            "label"=>"OCC",
            "mention_id"=>$mentionIA->id
        ]);

        // matière
        \App\Models\Matiere::factory()->create([
            "label"=>"Analyse",
            "categorie_id"=>$dev->id
        ]);
        \App\Models\Matiere::factory()->create([
            "label"=>"Algèbre",
            "categorie_id"=>$dev->id
        ]);
        \App\Models\Matiere::factory()->create([
            "label"=>"Proba Stat",
            "categorie_id"=>$dev->id
        ]);
        \App\Models\Matiere::factory()->create([
            "label"=>"Electronique Analogique",
            "categorie_id"=>$reseau->id
        ]);
        \App\Models\Matiere::factory()->create([
            "label"=>"Electronique Numérique",
            "categorie_id"=>$reseau->id
        ]);

        \App\Models\Matiere::factory()->create([
            "label"=>"Algorithme",
            "categorie_id"=>$dev->id
        ]);

        \App\Models\Matiere::factory()->create([
            "label"=>"Langage C",
            "categorie_id"=>$dev->id
        ]);

        \App\Models\Matiere::factory()->create([
            "label"=>"Javascript",
            "categorie_id"=>$dev->id
        ]);

        \App\Models\Matiere::factory()->create([
            "label"=>"Html & Css",
            "categorie_id"=>$dev->id
        ]);

        \App\Models\Matiere::factory()->create([
            "label"=>"Xml",
            "categorie_id"=>$dev->id
        ]);

        \App\Models\Matiere::factory()->create([
            "label"=>"Architecture Ordinateur",
            "categorie_id"=>$reseau->id
        ]);

        \App\Models\Matiere::factory()->create([
            "label"=>"Reseau informatique",
            "categorie_id"=>$reseau->id
        ]);

        \App\Models\Matiere::factory()->create([
            "label"=>"Gns3",
            "categorie_id"=>$reseau->id
        ]);

        \App\Models\Astuce::factory(10)->create();   


        // création ENI, presentation ENI, ENI, 
        // Relever de note, Deposer livre memoire, Diplôme 
        // date reception, date dans calendrier pédagogique, 
        // Responsable service - Personnelle (bureau), responsable de mention 
        // description bâtiment (salle)

        // créé question et response
        $presentation= \App\Models\Response::factory()->create(
            [
                "label"=>"L'ENI ou l'école nationale d'informatique, est la pépinière des élites en informatique. Son but est de former des élites compétents! Elle se situe à Tanambao Fianarantsoa."]
        );

        $question= \App\Models\Question::factory()->create(
            [
                'mot_cle'=> "ENI",
                "phrase"=> "C'est quoi ENI ?",
                "reponse" => $presentation->id
            ]
        );
        
        $relever= \App\Models\Response::factory()->create(
            [
                "label"=>"Pour le demande de relever de note ou diplôme, rendez-vous au service de scolarité dans la salle 003"]
        );

        $questionRelever= \App\Models\Question::factory()->create(
            [
                'mot_cle'=> "relever de note",
                "phrase"=> "Où je peut avoir mon relever des notes? ",
                "reponse" => $relever->id
            ]
        );
        $questionDiplôme= \App\Models\Question::factory()->create(
            [
                'mot_cle'=> "Diplôme",
                "phrase"=> "Où je peut faire mon demande de diplôme ? ",
                "reponse" => $relever->id
            ]
        );

        $responsableMention= \App\Models\Response::factory()->create(
            [
                "label"=>"Les responsables de mention sont : Monsieur RABETAFIKA Louis Haja, Maître de Conférences pour la mention 'Informatique'; et Monsieur DIMBISOA William Germain, Maître de Conférences pour la mention 'Intelligence Artificielle'."
            ]
        );

        $responsableParcours= \App\Models\Response::factory()->create(
            [
                "label"=>"Les responsables de parcours sont : Monsieur RALAIVAO Jean Christian, Assistant d’Enseignement Supérieur et de Recherche pour la parcours 'Génie Logiciel et Base de Données' Monsieur SIAKA, Assistant d’Enseignement Supérieur et de Recherche  pour la parcours 'Administration Systèmes et Réseaux'; et pour finir, Monsieur GILANTE Gesazafy, Assistant d’Enseignement Supérieur et de Recherche pour la parcours 'Informatique Générale'"
            ]
        );



        $questionResp= \App\Models\Question::factory()->create(
            [
                'mot_cle'=> "Mention",
                "phrase"=> "Qui sont les responsables de mention ?",
                "reponse" => $responsableMention->id
            ]
        );

        $questionMention= \App\Models\Question::factory()->create(
            [
                'mot_cle'=> "Mention",
                "phrase"=> "Qui sont les responsables de parcours ?",
                "reponse" => $responsableParcours->id
            ]
        );

        

    }
}

