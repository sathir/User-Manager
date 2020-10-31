<?php

use Illuminate\Support\Facades\Route;

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


Route::get('test','TestController@run_test')->name('myTest');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/create-newuser','UserController@CreateNewUser')->name('user-create');

Route::get('/edit-newuser/{user}','UserController@EditUser')->name('user-edit');

Route::post('/update-newuser','UserController@UpdateUser')->name('user-update');

Route::post('/user/role/update','UserController@UpdateRole')->name('user-role-update');

Route::post('user/delete','UserController@DeleteUser')->name('user-delete');


    // Route::get('api/user{id}', 'ApiController@user')->name('user');
    // Route::get('api/roles{id}', 'ApiController@role')->name('role');

    Route::group([], function()  
{  
    Route::get('/api/user/{number}', function ($number) {
        $user = User::find($request->id);
    
        return Response::json(array('data' => $user));
    });
});  

//     Route::group(function (){
// });