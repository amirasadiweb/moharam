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

Route::auth();

//
//Route::get('/', function () {
//    $pepole=['amir','ali','reza'];
//
//    return view('welcome',compact('pepole'));
//});



Route::get('config/','PageController@config');

//Route::get('/config',function(){
//
//    dd(app('config'));
//
//});

Route::get('about',function(){
    return view('about');
});

//
//Route::group(['prefix'=>'admin'],function(){
//
//
//    Route::get('/',['as'=>'home','uses'=>'PageController@home']);
//    Route::get('cards',['as'=>'index','uses'=>'CardsController@index']);
//    Route::get('cards/{card}',['as'=>'show_card','uses'=>'CardsController@show'])->middleware('MustBeAdministrator');
//    Route::post('cards/{card}/notes','NoteController@store');
//
//
//});
//


Route::group(['prefix'=>'api','middleware'=>'auth:api'],function (){
    Route::get('users/{user}',function (\App\User $user)
    {
        return $user;
    });
});


Route::get('event',function (){
    $user=auth()->LoginUsingId(3);
    event(new \App\Events\UserWasBanned($user));
});

Route::get('/',['as'=>'home','uses'=>'PageController@home']);
Route::get('cards',['as'=>'index','uses'=>'CardsController@index']);
Route::get('cards/{card}',['as'=>'show_card','uses'=>'CardsController@show']);
Route::post('cards/{card}/notes',['as'=>'store_note','uses'=>'NoteController@store']);



Route::get('notes/{note}/edit',['as'=>'edit_note','uses'=>'NoteController@edit']);//edit
Route::patch('notes/{note}',['as'=>'update_note','uses'=>'NoteController@update']);//update

Route::get('/home', 'HomeController@index');


Route::resource('/resource','ResourceController');

Route::get('report','PageController@report');


Auth::loginUsingId(1);

Route::get('document/{document}','DocumentController@show');


use Illuminate\Support\Facades\Cache;

Route::get('cache',function(){

    Cache::put('foo','amir asadi');
    return Cache::get('foo');
});