<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $answerUser = new AnswerUser();
        $answerUser->token = "test_token";
        $answerUser->save();

        foreach($request->answers as $one)
        {
            $one = json_decode($one);
            $answer = new Answer();
            $answer->$answer_user_id = $answerUser->id;
            $answer->answer = $one->answer;
            // $answer->question_id = $one->answer;
            $answer->save();
            // return response()->json($one);
        }
        // return response()->json($request->test);
        return response()->json([
            'message' => 'Nouveau sondage utilisateur créé !',
            'code' => 200
        ]);
    }
    





    // public function saveQuestionsSurvey($request)
    // {
    //     // $answerUser = new AnswerUser();
    //     // $answerUser->token = "test_token";
    //     // $answerUser->save();

    //     foreach($request->answers as $one)
    //     {
    //         $one = json_decode($one);

    //         // $answer = new Answer();
    //         // // $answer->$answer_user_id = $answerUser->id;
    //         // $answer->answer = $one->answer;
    //         // $answer->save();
            
    //         // $answerQuestion = new AnswerQuestion();
    //         // $answerQuestion->answer_id = $answer->id;
    //         // $answerQuestion->question_id = $one->questionId;
    //         // $answerQuestion->save();
    //     }
        
    //     return response()->json($request->all());
    //     // return response()->json([
    //     //     'message' => 'Nouveau sondage utilisateur créé !',
    //     //     'code' => 200
    //     // ]);
    // }

}
