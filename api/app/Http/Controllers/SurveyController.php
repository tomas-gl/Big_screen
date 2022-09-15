<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Survey;
use App\Models\Answer;

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
        foreach($request->answers as $one)
        {
            $one = json_decode($one);
            $answer = new Answer();
            $answer->answer = $one->answer;
            // $answer->question_id = $one->answer;
            $answer->save();
            // return response()->json($one);
        }
        // return response()->json($arr);
        return response()->json([
            'message' => 'Nouveau sondage utilisateur créé !',
            'code' => 200
        ]);
    }

}
