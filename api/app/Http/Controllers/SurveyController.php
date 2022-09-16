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

        // $email = json_decode($request->answers[0]);
        $validatedMail = false;
        // $answerArr = [];
        // foreach($request->answers as $one)
        // {
        //     $one = json_decode($one);
        //     array_push($answerArr, $one);
        // }
        // $answerArr = json_decode($request->answers);
        
        // foreach($answerArr as $one){
            $validator = $request->validate([
                'answers.*.answer' => 'required|string',
            ]);
        // }
        if($validator){
            return response()->json([
                'status' => 'success',
                'msg' => 'Ok',
            ], 201);
        }
        else{
            return response()->json([
                'status' => 'error',
                'msg' => 'Error',
            ], 422);
        }
        return response()->json($request);
    }

    // Nom: getSurveyResult
    // Type:
    // Parametres ou champs (data):
    // Role:
    // public function getSurveyResult($token)
    // {
    //     $answerUser = AnswerUser::where('token', $token)->first();
    //     $answers = Answer::where('answer_user_id', $answerUser->id)->first();
    //     // foreach($answers as $one){
    //     //     $one['question_id'] = $one->questions()->attach($one->question_id);
    //     // }
    //     // $question = $answers->question();
    //     return response()->json($answers, $question);
    // }

}
