<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carbon = Carbon::createFromFormat('Y-m-d','2020-06-22','9'); //дата проведения
        $carbon_now = Carbon::now();


        $date = $carbon->diffInDays($carbon_now); //осталось дней  

        return view('home',[
            'date' => $date,
            'dateFinal' => $carbon,
        ]);
    }
}
