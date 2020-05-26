<?php
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'AffairController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/time', function() {
	$carbon = new Carbon();
	// $carbon = Carbon::today();
	// $carbon = Carbon::tomorrow();
	
	//$carbon = new Carbon('first day of next month');
	//$carbon = new Carbon('last day of next month');
	//$carbon = new Carbon('first day of this month');

	// $carbon = Carbon::createFromDate(2020,6,01);
	// $carbon = Carbon::createFromTime(2,10,30);
	// $carbon = Carbon::createFromTimeString("2:20:30"); //как стротку

	//$carbon = Carbon::create(2020,06,01,12,34,40); //можно и без времени тогда будет по 0

//форматы дат
	$carbon = Carbon::createFromFormat('Y-m-d','2020-06-22','9'); //можео без тире чтобы менять через url . 3 аргумент это временной пояс 
	$carbon2 = Carbon::createFromFormat('Y-m-d','2020-06-30','9');
	//$cp = $carbon->copy(); копировать текущую дату
	$carbon_now = Carbon::now();
	echo $carbon_now->format("Y-m-d").' сегодняшняя дата<br>';
	echo $carbon->format("Y-m-d").' дата проведения<br>';

	echo 'осталось '. $carbon->diffInDays($carbon_now) . ' дней'; //осталось дней

//сравненние дат
	// var_dump($carbon->eq($carbon2)); //эквивалент, равенство дат
	// var_dump($carbon->ne($carbon2)); //проверка неравенства дат
	// var_dump($carbon->gt($carbon2)); // > greater then (больше чем) если первая дата больше второй то true
	// var_dump($carbon->gte($carbon2)); // >= (больше равно) если первая дата больше или равно второй то true

	// var_dump($carbon->lt($carbon2)); // < (меньше чем) если первая дата меньше второй то true
	// var_dump($carbon->lte($carbon2)); // <= (меньше равно) если первая дата меньше или равно второй то true

	// echo '<br>'.$carbon->format("Y-m-d"); //можно только дату или год или месяц
	// echo '<br>'.$carbon2->format("Y-m-d");

//фильтровка дат
	//echo (Carbon::now()->closest($carbon,$carbon2)); ///вывод ближайших даты
	//echo (Carbon::now()->farthest($carbon,$carbon2)); ///вывод крайней даты
 
//проверка дат
	//var_dump($carbon->isMonday()); //isTuesday
	//var_dump($carbon->isToday()); 


	//echo $carbon->toDateString(); //toTimeString только время
	//echo $carbon->toFormattedDateString();
	//setlocale(LC_TIME, 'Russians');
	//echo $carbon->toDayDateTimeString(); //готовый формат времени и даты 
	//echo iconv("windows-1251","utf-8",$carbon->formatLocalized('%A %d %B %Y')); //почему то язык не русский

	//$carbon = Carbon::parse('2020-06-22 23:26:11'); //парсит строку времени и дату 
	// echo $carbon->year = 2022;
	// echo $carbon->day;
	// echo $carbon->month;
	// echo $carbon->dayOfWeek;


//изменить аргументом текущую дату 
	//$carbon->AddYears(10); //можно year и остальные методы


	
});

//Route::get('/home',"AffairController@number");
 

// Route::post('/create','AffairController@create'); 

// Route::post('/update','AffairController@update'); 

// Route::post('/delete','AffairController@destroy'); 

// Auth::routes();

//