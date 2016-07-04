<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*use Faker\Factory as Faker;*/

Route::auth();

Route::get('/', function () {
    return redirect('match');
});

Route::get('home', 'HomeController@index');

Route::get('match','MatchController@index');

Route::get('user',function (){
	return redirect(url('/user/'.Auth::id()));
}); 

/*Admin middleware*/
Route::group(['middleware' => 'admin'], function () {
	Route::get('admin', function(){
	return view('match2');
	});
	/*Match Manager*/
	Route::get('match2','MatchController@indexAdmin');
	Route::get('match2/{id}','MatchController@destroy');
	Route::post('match2/{id}','MatchController@updateResult');

	Route::get('matchcreate','MatchController@create');
	Route::post('matchcreate','MatchController@store');

	Route::get('matchmodify/{id}','MatchController@show');
	Route::post('matchmodify/{id}','MatchController@update');

	Route::get('matchdetail/{id}','MatchController@showDetail');

	/*User Manager*/
	Route::get('user2','UserController@index');

	/*Bet Manager*/
	Route::get('bet2','BetController@index');
});


/*User middleware*/
Route::group(['middleware' => 'user'], function () {
    Route::get('user/{id}','UserController@show');
    Route::get('bet/{match_id}','MatchController@show2');
	Route::post('bet/{match_id}','BetController@update');

});



/*Route::get('faker',function(){
	$faker = Faker::create();
	return $faker->name;
});*/

/*Route::group(['prefix'=>'admin', 'namespace'=>"Admin"],function(){
	
});*/


