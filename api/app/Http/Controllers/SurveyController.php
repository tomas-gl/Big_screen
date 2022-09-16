<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Validator;
use App\Models\Question;
use App\Models\Survey;
use App\Models\Answer;
use App\Models\AnswerUser;
use App\Models\AnswerQuestion;

class SurveyController extends Controller
{


    // Nom: getQuestionsSurvey
    // Type:
    // Parametres ou champs (data):
    // Role:
    public function getQuestionsSurvey() 
    {
        $survey = Survey::all()->first();
        $questions = Question::where('survey_id', $survey->id)->get();
        // dd($survey, $questions);
        // return view('welcome', $questions);
        return response()->json($questions);
    }

    // Nom: saveQuestionsSurvey
    // Type:
    // Parametres ou champs (data):
    // Role:
    public function saveQuestionsSurvey(Request $request)
    {

        $email = json_decode($request->answers[0]);
        $validatedMail = false;

        if(filter_var($email->answer, FILTER_VALIDATE_EMAIL)){
            $validatedMail = true;
            // $answerUser = new AnswerUser();
            // $answerUser->token = Str::random(30);
            // $answerUser->save();
    
            // foreach($request->answers as $one)
            // {
            //     $one = json_decode($one);
    
            //     $answer = new Answer();
            //     $answer->answer_user_id = $answerUser->id;
            //     $answer->answer = $one->answer;
            //     $answer->save();
                
            //     $answerQuestion = new AnswerQuestion();
            //     $answerQuestion->answer_id = $answer->id;
            //     $answerQuestion->question_id = $one->questionId;
            //     $answerQuestion->save();
            // }
            
            return response()->json([   
                'validatedMail' => $validatedMail,
                'Message' => 'Nouveau sondage utilisateur créé !'
            ]);
        }
        else{
            return response()->json([
                'validatedMail' => $validatedMail,
            ]
            );
        }

        //     $one = json_decode($request->answers[0]);
        //     return response()->json($email);
        // }
    }

}
