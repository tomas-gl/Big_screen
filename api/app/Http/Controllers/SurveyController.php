<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Survey;

class QuestionnaireController extends Controller
{


  // Nom: getQuestionsSurvey
  // Type:
  // Parametres ou champs (data):
  // Role:
    public function getQuestionsSurvey()
    {
        $survey = Survey::where('id', '1')->get();
        $questions = Question::where('survey_id', $survey->id)->get();
        return response()->json($questions);
    }

}
