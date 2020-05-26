<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Affair;
use App\User;
use Carbon\Carbon;

class AffairController extends Controller
{

    public function index() { 
        $carbon = Carbon::createFromFormat('Y-m-d','2020-06-22','9'); //можео без тире чтобы менять через url . 3 аргумент это временной пояс 
        $carbon2 = Carbon::createFromFormat('Y-m-d','2020-06-30','9');
        //$cp = $carbon->copy(); копировать текущую дату
        $carbon_now = Carbon::now();
        // echo $carbon_now->format("Y-m-d").' сегодняшняя дата<br>';
        // echo $carbon->format("Y-m-d").' дата проведения<br>';

        $date = 'осталось '. $carbon->diffInDays($carbon_now) . ' дней'; //осталось дней  

        	return view('home',[
	    	'affair'=>Affair::all(),
	    	'users'=>User::all(),
            'date' => $date,
    	]);
    }

    public function time() {
        $current = new Carbon();
        echo $current;
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
