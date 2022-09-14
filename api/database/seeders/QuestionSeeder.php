<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use DB;
use Carbon\Carbon;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert(
            array(
                [
                    'survey_id' => '1',
                    'num_question' => '1',
                    'question' => 'Votre adresse mail',
                    'type_question' => 'B',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '2',
                    'question' => 'Votre âge',
                    'type_question' => 'B',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '3',
                    'question' => 'Votre sexe',
                    'type_question' => 'A',
                    'possible_answers' => 'Homme, Femme, Préfère ne pas répondre',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '4',
                    'question' => 'Nombre de personne dans votre foyer (adulte & enfants)',
                    'type_question' => 'C',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '5',
                    'question' => 'Votre profession',
                    'type_question' => 'B',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '6',
                    'question' => 'Quel marque de casque VR utilisez-vous ?',
                    'type_question' => 'A',
                    'possible_answers' => 'Oculus Quest, Oculus Rift/s, HTC Vive, Windows Mixed, Reality, Valve index',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '7',
                    'question' => 'Sur quel magasin d’application achetez vous des contenus VR ?',
                    'type_question' => 'A',
                    'possible_answers' => 'SteamVR, Occulus store, Viveport, Windows Store',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '8',
                    'question' => 'Quel casque envisagez-vous d’acheter dans un futur proche ?',
                    'type_question' => 'A',
                    'possible_answers' => 'Occulus Quest,Occulus Go, HTC Vive Pro, PSVR, Autre, Aucun',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '9',
                    'question' => 'Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder
                    Bigscreen ?',
                    'type_question' => 'C',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '10',
                    'question' => 'Vous utilisez principalement Bigscreen pour :',
                    'type_question' => 'A',
                    'possible_answers' => 'regarder la TV en direct, regarder des films, travailler, jouer en solo, jouer en équipe',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '11',
                    'question' => 'Combien donnez-vous de point pour la qualité de l’image sur Bigscreen ?',
                    'type_question' => 'C',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '12',
                    'question' => 'Combien donnez-vous de point pour le confort d’utilisation de l’interface Bigscreen ?',
                    'type_question' => 'C',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '13',
                    'question' => 'Combien donnez-vous de point pour la connexion réseau de Bigscreen ?',
                    'type_question' => 'C',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '14',
                    'question' => 'Combien donnez-vous de point pour la qualité des graphismes 3D dans Bigscreen ?',
                    'type_question' => 'C',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '15',
                    'question' => 'Combien donnez-vous de point pour la qualité audio dans Bigscreen ?',
                    'type_question' => 'C',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '16',
                    'question' => 'Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?',
                    'type_question' => 'A',
                    'possible_answers' => 'Oui, Non',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '17',
                    'question' => 'Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?',
                    'type_question' => 'A',
                    'possible_answers' => 'Oui, Non',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '18',
                    'question' => 'Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?',
                    'type_question' => 'C',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '19',
                    'question' => 'Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?',
                    'type_question' => 'C',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    'survey_id' => '1',
                    'num_question' => '20',
                    'question' => 'Quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?',
                    'type_question' => 'C',
                    'possible_answers' => '',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
            )
        );
    }
}
