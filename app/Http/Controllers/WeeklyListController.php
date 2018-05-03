<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeeklyList;
use App\User;
use Session;

class WeeklyListController extends Controller
{
    
    public function __construct(){

        $this->middleware('cengage');
    }
    //Display resource listing
    public function index(){
    	$weeklyLists = WeeklyList::where('email', 'like', session()->get('email'))->latest('startDate')->paginate(5);
        $users =  User::pluck('name','email');
        session(['self' => '1']); 
    	return view('weeklyList.index',compact('weeklyLists','users'));
    }
    public function routes(){
        $routeCollection = \Route::getRoutes();

        dd($routeCollection);
    }
    //Show the form for creating new response
    public function create(){
    	return view('weeklyList.create');
    }

    //Store newly created resource to thr database
    public function store(Request $request){
    	
    	$this->validate($request, [
    		'email' => 'bail|required|email',
    		'startDate' => 'bail|required|date_format:m/d/Y|before:tomorrow',
    		'endDate' => 'bail|required|date_format:m/d/Y|after:startDate',
    		'priorities' => 'required'
		]);

        $weeklyList = new WeeklyList;
        $weeklyList->startDate = $request->startDate;
        $weeklyList->endDate = $request->endDate;
        $weeklyList->email = $request->email;
        $weeklyList->priorities = $request->priorities;
        $weeklyList->accomplishments = $request->accomplishments;
		$weeklyList->save();

		//$headers = 'From: nidhi.patharia@contractor.cengage.com' . '\r\n';
		/*if(mail('patharianidhi@gmail.com','testing','Weekly Priorrities sent from cengage', $headers))
		{
			echo "done";
			exit;
		}
		else{
			echo "not done";
		}*/
    	return redirect('weeklyList')->with('message','Data Successfully submitted');
    }

    //Display specific resource
    public function show($id){
    	
    }


    //Show the form for editing specified resource
    public function edit($id){
    	$list = WeeklyList::find($id);
    	return view('weeklyList.edit')->with('list',$list);
    }

    //Update the specified resource in database
    public function update(Request $request, $id){
    	$this->validate($request, [
            'email' => 'bail|required|email',
            'startDate' => 'bail|required|date_format:m/d/Y|before:tomorrow',
            'endDate' => 'bail|required|date_format:m/d/Y|after:startDate',
            'priorities' => 'required'
        ]);
       
        $weeklyList = WeeklyList::find($id);
        $weeklyList->startDate = $request->startDate;
        $weeklyList->endDate = $request->endDate;
        $weeklyList->email = $request->email;
        $weeklyList->priorities = $request->priorities;
        $weeklyList->accomplishments = $request->accomplishments;
        $weeklyList->save();
        return redirect('weeklyList')->with('message','Data Successfully updated');
    }

    //Delete the resource from database
    public function destroy($id){
    	$weeklyList = WeeklyList::find($id);
        $weeklyList->delete();
        return redirect('weeklyList')->with('message','Data deleted');
    }

    //Filter the resource from database
    public function filter(Request $request){
       
        $year = $request->year; 
        $month = $request->month;
        $email = strtolower($request->email);
        
        
        $weeklyLists = new WeeklyList;
        if($email == ''){
            $email = session()->get('email');
        }
        if($email == session()->get('email'))
        {
            session(['self' => '1']);  
        }
        else
        {
            session(['self' => '0']);
        }
        
        if($year == '' && $month == ''){
            $weeklyLists = $weeklyLists->where('email', 'like', $email)->latest('startDate')->paginate(5);    
        }
        else if($month == ''){
           $weeklyLists = $weeklyLists->where('email', 'like', $email)->whereYear('startDate', '=', $year)->paginate(5); 
        }
        else if($year == ''){
            $weeklyLists = $weeklyLists->where('email', 'like', $email)->whereMonth('startDate', '=', $month)->latest('startDate')->paginate(5);
        }
        else{
            $weeklyLists = $weeklyLists->where('email', 'like', $email)->whereYear('startDate', '=', $year)->whereMonth('startDate', '=', $month)->latest('startDate')->paginate(5);
        }
        $users = User::pluck('name','email');

        return view('weeklyList.index',compact('weeklyLists','users'));
    }
}
