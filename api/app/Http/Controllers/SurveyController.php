<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Survey;

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

    // Nom: getQuestionsSurvey
    // Type:
    // Parametres ou champs (data):
    // Role:
    // public function getQuestionsSurvey()
    // {
    //     $survey = Survey::all()->first();
    //     $questions = Question::where('survey_id', $survey->id)->get();
    //     // dd($survey, $questions);
    //     // return view('welcome', $questions);
    //     return response()->json($questions);
    // }

}
