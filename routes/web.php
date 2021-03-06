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


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return view('welcome');
});
//入力ページ
Route::get('/contact', 'ContactController@index')->name('contact.index');

//確認ページ
Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm');

//送信完了ページ
Route::post('/contact/thanks', 'ContactController@send')->name('contact.send');

Route::view('/about', 'about');

Route::view('/help','help');

Route::resource('outline','OutlineController');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');



Route::get('user/profile',[
    'uses'=>'ProfilesController@index',
    'as'=>'user.profile'
]);

Route::put('/profile/update',[
    'uses' =>'ProfilesController@update',
    'as' =>'profile.update'
]);

Route::resource('user','ProfilesController');

Route::resource('groups','GroupsController');

Route::resource('category','CategoryController');

Route::resource('plans','PlansController');

Route::post('/pay','PaymentController@pay')->name('pay');

Route::get('/user/{userId}','UserController@show');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');

Route::get('/outlinesearch','OutlineController@search');
Route::get('/groupsearch','GroupsController@search');
Route::get('/plansearch','PlansController@search');
Route::get('/categorysearch','CategoryController@search');

Route::get('/group/{groupid}/{userid}',[
    'uses' => 'GroupsController@join',
    'as' => 'group.join'
]);

// Twitter認証のため
Route::get('/login/{social}', 'Auth\OAuthLoginController@socialLogin')->where('social', 'twitter');
Route::get('/login/{social}/callback', 'Auth\OAuthLoginController@handleProviderCallback')->where('social', 'twitter');

