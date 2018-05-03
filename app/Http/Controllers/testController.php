<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //

    public function index(){
    	return view('test');
    }
    public function testing(Request $request){
    	$year = $request->year;
    	return $year;
    }
}
