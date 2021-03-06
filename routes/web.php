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

    Route::get('remove-from-cart/{id}',[
        'uses'=>'CartController@removeItem',
        'as'=>'removeFromCart'
    ]);


    Route::get('destroy-cart',[
        'uses'=>'CartController@destroyCart',
        'as'=>'destroyCart'
    ]);
    Route::get('check-out',[
        'uses'=>'CartController@getCheckout',
        'as'=>'checkout'
    ]);
    Route::post('order',[
        'uses'=>'CartController@postCheckout',
        'as'=>'order'
    ]);
    Route::put('update-cart/{id}',[
        'uses'=>'CartController@updateCart',
        'as'=>'updateCart'
    ]);

});

////////contact/////

Route::post('/contact',[
    'uses'=>'ContactController@postToAdmin',
    'as'=>'contact'
]);

Route::get('/contact',[
    'uses'=>'ContactController@getContact',
    'as'=>'contact'
]);



////////ADMIN//////
Route::group(['prefix'=>'admin'],function (){

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

Route::get('search',[
    'uses'=>'FrontendController@search',
    'as'=>'search'
]);

