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

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;


/*class test2{

    private $ip;
    public $uid;
    public function __construct(string $ip)
    {
        $this->ip = $ip;
        $this->uid = uniqid();
    }
}

App::singleton('test2', function(){
    $request = App::make('request');
    $ip = $request->getClientIp();
    return new test2($ip);
});
*/

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

Route::get('forbidden', function(){
    return view('403');
});

/**
 * Controller
 */

Route::any('needcontroller/{name?}', 'Page\pageController@index');
Route::any('needview', 'Page\pageController@show');
Route::resource('test', 'Page\testController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('states', 'StateController');
Route::group(['middleware' =>  ['auth'] ], function(){
    Route::resource('users', 'UserController');
    Route::resource('annonces', 'AnnonceController');
});
