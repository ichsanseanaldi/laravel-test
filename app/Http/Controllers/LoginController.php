<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    
    public function index(){

        return view('login');

    }

    public function login(Request $request){

        $credentials = $request->validate([

            'email' => ['required', 'email'],

            'password' => ['required'],

        ]);

        if(Auth::attempt($credentials)){
            
            User::where('email',$request['email'])
                ->update(['last_login'=>date("Y-m-d H:i:s")]);

            $request->session()->regenerate();

            return redirect()->intended('/user');

        }

        return back()->withErrors([
            'email' => 'email salah',
            'password' => 'password salah'
        ]);

    }

    public function logout(Request $request){

        Auth::logout();
        
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');

    }

    public function register(Request $request){

        $validate = $request->validate([
            'email'=> ['required'],
            'name'=>['required'],
            'password'=>['required'],
            'role'=>['required']
       ]);

        $validate["password"] = bcrypt($request["password"]);

        $find = User::where('email',$request["email"])->first();

        if(!$find){
            User::create($validate);
            return redirect()->route('login')->with(['status'=>'Register Success!']);
        } 
        else{
            return redirect()->back()->withErrors(['message' => 'Email already Exist']);
        }
    
    }

}
