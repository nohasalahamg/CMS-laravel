<?php

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

Route::get('/', 'WelcomeController@index');
Route::Get('/post-show','postcontroller@show');
Auth::routes();


Route::group(['middleware'=>'auth'],function(){




    Route::get('/home', 'HomeController@index')->name('home');
    Route::Resource('/category','categorycontroller');
    Route::Resource('/tag','tagcontroller');
    
    //Route::Resource('/post','postcontroller')->middleware('Checkcategory');
    
    Route::Resource('/post','postcontroller');

    
    Route::Get('/trash-post','postcontroller@trashed')->name('trashed.index');
    
    
    Route::Get('/restore-post/{id}','postcontroller@restore')->name('trashed.restore');


}
);

Route::middleware(['auth','admin'])->group(


function(){

    Route::get('/user', 'userController@index')->name('user.index');

    Route::get('/user/create', 'userController@create')->name('user.create');

    
    Route::post('/user/{user}/makeadmin', 'userController@makeadmin')->name('user.makeadmin');

    Route::post('/user/{user}/makenormal', 'userController@makenormal')->name('user.makenormal');

}
);


Route::middleware(['auth'])->group(


    function(){
    
        Route::get('/dashboard', 'dashboardController@index')->name('dashboard');


        Route::get('/user/{user}/edit', 'userController@edit')->name('user.edit');
        Route::POST('/user/{user}/update', 'userController@update')->name('user.update');

        Route::POST('/user/{user}/store', 'userController@store')->name('user.store');
    
    
    }
    );