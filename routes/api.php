<?php

use Illuminate\Http\Request;
use App\Affair;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('/task','TasksController', [
// 	'exept' => ['create', 'edit', 'show']
// ]);


Route::post('/axio','AffairController@getDick'); 
Route::post('/affair','AffairController@test'); 

Route::post('/dobav','AffairController@test'); 
Route::post('/delete/{id}','AffairController@destroy'); 
Route::post('/update','AffairController@update'); 



Route::get('/get','AffairController@affairshow'); 
Route::get('/au','AffairController@auth'); 

// Route::post('/axio',function (){
// 	return "hello nigga";
// }); 

Route::middleware('auth:api')->resource('users', 'AffairController');