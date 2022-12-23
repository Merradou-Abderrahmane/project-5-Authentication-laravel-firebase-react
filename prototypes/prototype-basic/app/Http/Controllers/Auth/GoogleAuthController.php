<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use Laravel\Socialite\Facades\Socialite;


class GoogleAuthController extends Controller

{
    //
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver("google")->user();
            // dd($google_user);
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {

                $Add_user = User::create([
                    "name" => $google_user->getName(),
                    "email" => $google_user->getEmail(),
                    "google_id" => $google_user->getId(),
                ]);
                Auth::login($Add_user);
                return redirect()->intended('/dashboard');
            } else {
                Auth::login($user);
                return redirect()->intended('/dashboard');
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd('eruur' . $th->getMessage());
        }
    }  
}




// function callbackGoogle(){
//     try {
//         $google_user = Socialite::driver("google")->user();
//         // dd($google_user);
//         $user= User::where('google_id',$google_user->getId())->first();

//              if(! $user){

//         $Add_user=User::create([
//             "name"=>$google_user->getName(),
//             "email"=>$google_user->getEmail(),
//             "google_id"=>$google_user->getId(),
//         ]);
//         Auth::login($Add_user);
//             return redirect()->intended('/dashboard');
//         }
//         else{
//             Auth::login($user);
//             return redirect()->intended('/dashboard');

//         }


//     } catch (\Throwable $th) {
//         //throw $th;
//         dd('eruur'.$th->getMessage());
//     }
// }
