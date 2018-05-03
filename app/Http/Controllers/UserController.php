<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    //
    public $table = 'users';
    public function index(){
    	return view('login');
    }
    public function authenticate(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

         if (User::where('email', '=', $request->input('email'))->exists()) {
            session(['email' => $request->input('email')]);  
            return redirect('weeklyList');
        }     
        else 
            return redirect('/')->withErrors("Not an authorized user");
    }
}
