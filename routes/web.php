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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/**
 * Route & Middleware
 */

Route::group(['prefix' => 'formaland', 'middleware' => 'ip' ], function(){

    Route::match(['get', 'put'],'/oppa', function(){
        return  'je suis la ';
    });

    Route::get('/params/{name?}', function($name = null){

        if(isset($name)){
            return $name;
        }
        return redirect('/');

    });

    Route::get('strict/{name}/{id}', function($name, $id){
        return $name . '   '. $id;
    })->where(['name' => '[A-Za-z]+', 'id' => '[0-9]+']);
});


Route::get('withmodel/{test}', function( App\test $test){
    $monTest = App\test::where('name', 'mon name')->get();
    dd($monTest);
});

Route::any('middleware', function(){
    return response('test middleware pour une seule route');
})->middleware('ip:["192.168.1.1", "192.168.1.2", "192.168.1.3"]');

Route::get('not_found', function(){
    return view('404');
});

/**
 * Controller
 */

