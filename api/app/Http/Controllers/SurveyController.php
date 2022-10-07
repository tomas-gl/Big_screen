<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use App\Models\Question;
use App\Models\Survey;
use App\Models\Answer;
use App\Models\AnswerUser;

class SurveyController extends Controller
{


    /**
     * Récupère la liste des questions
     *
     * @return response
     */
    public function getQuestionsSurvey() 
    {
        $survey = Survey::all()->first();
        $questions = Question::where('survey_id', $survey->id)->get();
        return response()->json($questions);
    }

    /**
     * Sauvegarde un nouveau sondagé créé
     *
     * @param  \Illuminate\Http\Request  $request
     * @return response
     */
    public function saveQuestionsSurvey(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'answers.*' => 'required',
            'answers.1' => 'required|email',
            'answers.2' => 'required|numeric'
        ],[
            'answers.*.required' => 'Veuillez renseigner tous les champs',
            'answers.1.email' => 'Veuillez rentrer une adresse mail valide',
            'answers.2.numeric' => 'Veuillez entrer un nombre pour votre âge',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'validatorErrors' => $validator->errors()->first()
            ]);
        }
        else{
            $answerUser = new AnswerUser();
            $answerUser->token = Str::random(30);
            $answerUser->save();
    
            foreach($request->answers as $key => $value)
            {
                
                $answer = new Answer();
                $answer->answer_user_id = $answerUser->id;
                $answer->answer = $value;
                $answer->save();

                $answer->questions()->attach($key);
            }
            return response()->json([   
                'answerUser' => $answerUser,
                'Message' => 'Nouveau sondage utilisateur créé !',
            ]);
        }
    }

    /**
     * Affiche les réponses pour un sondage
     *
     * @param  string  $token
     * @return response
     */
    public function getSurveyResult($token)
    {
        $answerUser = AnswerUser::where('token', $token)->first();
        $answerDate = $answerUser->created_at;
        $answers = Answer::where('answer_user_id', $answerUser->id)->get();
        foreach($answers as $one){
            $one['question'] = $one->questions()->pluck('question')->first();
            $one['num_question'] = $one->questions()->pluck('num_question')->first();
        }
        return response()->json([$answers, $answerDate]);
    }

}
