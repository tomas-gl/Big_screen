<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Question;
use App\Models\Survey;
use App\Models\Answer;
use App\Models\AnswerUser;
use App\Models\AnswerQuestion;

class AdminController extends Controller
{

    public function login(Request $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['auth_user' => Auth::user(), 200]);
        }

        throw ValidationException::withMessages([
            'email' => ['L\'adresse mail ou le mot de passe sont incorrects']
        ]);
    }


    // Nom: getSurveyDatas
    // Type:
    // Parametres ou champs (data):
    // Role:
    public function getSurveyDatas() 
    {
        $answers = Answer::get();

        $answerUser = AnswerUser::get();
        $questions = Question::get();
        foreach($answers as $one){
            $one['question'] = $one->questions()->pluck('question')->first();
            $one['num_question'] = $one->questions()->pluck('num_question')->first();
        }
        foreach($answerUser as $one){
            if(isset($answers)){
                $answersByUser[] = Answer::where('answer_user_id', $one->id)->get();
            }

        }
        if(isset($answersByUser)){
            foreach($answersByUser as $answerByUser){
                foreach($answerByUser as $one){
                    $one['question'] = $one->questions()->pluck('question')->first();
                    $one['num_question'] = $one->questions()->pluck('num_question')->first();
                }
            }
        }
        if(!isset($answerByUser)){
            return response()->json([
                'answers' => $answers,
                'questions' => $questions,
            ]);   
        }
        else{
            return response()->json([
                'answers' => $answers,
                'questions' => $questions,
                'answersByUser' => $answersByUser,
            ]);
        }

    }

}