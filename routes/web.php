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

Route::get('/',[
    'uses'=>'FrontendController@welcome',
    'as'=>'welcome'
]);

Route::get('detail/{id}',[
    'uses'=>'FrontendController@detailView',
    'as'=>'detail'
]);
Route::get('contact',[
    'uses'=>'FrontendController@getContact',
    'as'=>'contact'
]);
Route::post('contact',[
    'uses'=>'FrontendController@postContact',
    'as'=>'contact'
]);
Route::get('about',[
    'uses'=>'FrontendController@getAbout',
    'as'=>'about'
]);


///////////CART//////////
Route::prefix('cart')->group(function (){
    Route::get('/',[
        'uses'=>'CartController@getCart',
        'as'=>'cart'
    ]);

    Route::get('add-to-cart/{id}',[
        'uses'=>'CartController@addToCart',
        'as'=>'addToCart'
    ]);

    Route::get('remove-cart/{id}',[
        'uses'=>'CartController@removeItem',
        'as'=>'removeCart'
    ]);

    Route::get('check-out',[
        'uses'=>'CartController@checkout',
        'as'=>'checkout'
    ]);
    Route::get('empty-cart',[
        'uses'=>'CartController@emptyCart',
        'as'=>'emptyCart'
    ]);
    Route::post('order',[
        'uses'=>'CartController@postCheckout',
        'as'=>'order'
    ]);

});



////////ADMIN//////
Route::prefix('admin')->group(function (){

    Route::get('/',[
        'uses'=>'Admin\AdminController@getDashboard',
        'as'=>'dashboard'
    ]);
    Route::get('/login',[
        'uses'=>'Admin\AdminLoginController@showLoginForm',
        'as'=>'admin.login'
    ]);
    Route::post('/login',[
        'uses'=>'Admin\AdminLoginController@login',
        'as'=>'admin.login'
    ]);

    Route::resource('books','Admin\BookController');
});

////////USERS/////
Route::get('/home', 'HomeController@index')->name('home');


///////AUTH/////////

Auth::routes();

/////////Social///////
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

