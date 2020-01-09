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

Route::get('/', function () {
    $posts = App\Post::latest('published_at')->get();
    return view('welcome',compact('posts'));
});

Route::get('posts', function(){
    $posts = App\Post::latest('published_at')->get();
    return view('welcome',compact('posts'));
});

Route::get('home', function (){
   return view('admin.dashboard');
})->middleware('auth');

/*
 * Si ponemos Route::auth(); nos pondria todas las rutas de auth
 * Como en este caso no nos interesa, ya que  solo queremos las rutas para logear y logout
 *  hay que buscar las rutas de auth que estan en
 * vendor/laravel/framework/src/Illuminate/Routing/Router.php
 * */


//Rutas de login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Rutas de registro
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');
