<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Answer;
use App\Models\AnswerUser;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 30) as $iteration) {

            $firstPossibleAnswers = ["Homme", "Femme", "Préfère ne pas répondre"];
            $secondPossibleAnswers = ["Boulanger", "Boucher", "Bijoutier"];
            $thirdPossibleAnswers = ["Oculus Quest", "Oculus Rift/s", "HTC Vive", "Windows Mixed", "Reality", "Valve index"];
            $fourthPossibleAnswers = ["SteamVR", "Occulus store", "Viveport", "Windows Store"];
            $fifthPossibleAnswers = ["Occulus Quest", "Occulus Go", "HTC Vive Pro", "PSVR", "Autre", "Aucun"];
            $sixthPossibleAnswers = ["regarder la TV en direct", "regarder des films", "jouer en solo", "jouer en équipe"];
            $yesOrNo = ["regarder la TV en direct", "regarder des films", "jouer en solo", "jouer en équipe"];

            $iteration = [
                    '1' =>"test@test.com",
                    '2' => rand(10, 100),
                    '3' => $firstPossibleAnswers[array_rand($firstPossibleAnswers)],
                    '4' => rand(1, 5),
                    '5' => $secondPossibleAnswers[array_rand($secondPossibleAnswers)],
                    '6' => $thirdPossibleAnswers[array_rand($thirdPossibleAnswers)],
                    '7' => $fourthPossibleAnswers[array_rand($fourthPossibleAnswers)],
                    '8' => $fifthPossibleAnswers[array_rand($fifthPossibleAnswers)],
                    '9' => rand(1, 5),
                    '10' => $sixthPossibleAnswers[array_rand($sixthPossibleAnswers)],
                    '11' => rand(1, 5), 
                    '12' => rand(1, 5), 
                    '13' => rand(1, 5), 
                    '14' => rand(1, 5), 
                    '15' => rand(1, 5), 
                    '16' => $yesOrNo[array_rand($yesOrNo)],
                    '17' => $yesOrNo[array_rand($yesOrNo)],
                    '18' => rand(1, 5),
                    '19' => rand(1, 5),
                    '20' => Str::random(15)
            ];

            $answerUser = new AnswerUser();
            $answerUser->token = Str::random(30);
            $answerUser->save();

            foreach($iteration as $key => $value)
            {
                $answer = new Answer();
                $answer->answer_user_id = $answerUser->id;
                $answer->answer = $value;
                $answer->save();

                $answer->questions()->attach($key);
            }
        }
    }
}
