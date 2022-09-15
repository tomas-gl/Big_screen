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
    public function saveQuestionsSurvey(Request $request)
    {
        $answers = new CurrencyPair();
        // $currencyPair->first_currency_id = $request->firstCurrencyId;
        // $currencyPair->second_currency_id = $request->secondCurrencyId;
        // $currencyPair->conversion_rate = $request->conversionRate;
        // $currencyPair->conversion_request = 0;
        $currencyPair->save();
        return response()->json([
            'message' => 'Paire de devises créé !',
            'code' => 200
        ]);
    }

}
