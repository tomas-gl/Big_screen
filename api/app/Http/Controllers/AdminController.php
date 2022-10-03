<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Question;
use App\Models\Survey;
use App\Models\Answer;
use App\Models\AnswerUser;
use App\Models\AnswerQuestion;

class AdminController extends Controller
{

    // Nom: login
    // Type:
    // Parametres ou champs (data):
    // Role:
    public function login(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            // session(['loggedUser' => true]);
            return response()->json([
                'auth_user' => Auth::user(),
                // session('loggedUser'),
                // $request->session()->put('loggedIn', "test"),
                // $loggedUser,
                // session()->put('loggedIn', Auth::user()),
                // session()->save(),
                // session()->get('loggedIn'),
                 200
                ]);
        }

        throw ValidationException::withMessages([
            'email' => ['L\'adresse mail ou le mot de passe sont incorrects']
        ]);
    }

    // public function isLoggedIn(){
    //     //         dd(session('loggedUser'));
    //     // return view('welcome');
    //     // $session = Session::get('loggedUser');
    //     // if(isset($session)){
    //         return response()->json([
    //             session('loggedUser'),
    //             "test"
    //             ]);
    //     // }
    // }

}