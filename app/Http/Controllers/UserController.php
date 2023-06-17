<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
class UserController extends Controller
{
    public function login (){
        return view('auth.login');
    }
    public function registration (){
        return view('auth.registration');
    }
    public function registerAccount(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:5|max:12',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;
        $res = $user->save();

        if($res){
            return redirect('login');
        }else{
            return back()->with('fail',' Something wrong ');
        }
        
    }

    public function loginAccount(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }
            else{
                return back()->with('fail','Password is not correct.');
            }
        }else{
            return back()->with('fail','This email is not registered.');
        }
    }
    
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
