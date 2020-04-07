<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Affair;
use App\User;

class AffairController extends Controller
{

	
    public function index() {    	 
        	return view('home',[
	    	'affair'=>Affair::all(),
	    	'users'=>User::all()
    	]);
    }


    public function affairshow() {
    	$affair = Affair::all();

   		return $affair;
    }

    public function auth() {
    	

   		return Auth::user();
    }

    public function getDick(Request $request) {  
    	$name = $request->name;

    	return "Контролер работает мистер " . $name;
    }

    public function test(Request $request) {  
		Affair::create([
			"user_id" => $request->user_id,
			"name" => $request->name,
			"status" => $request->status,
		]); 	 
		//return back(); 
    }

    public function destroy(Request $request) {
        $aff = Affair::find($request->id)->delete();
        //return back();    
    }  




    public function create(Request $request) {
		Affair::create([
			"user_id" => $request->userID,
			"name" => $request->name,
			"status" => $request->status,

		]);
		
		return back();    	
    }

    public function update(Request $request) {
		$affair = Affair::find($request->id);
		$affair->status = $request->choose;
		$affair->save();
		//return back();    

    }
			


  //    public function store(Request $request) {
		// Affair::create($request->all());
		
		// return (['message'] => 'task vse norm');    	
  // }
}
