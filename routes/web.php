<?php
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace'=>'Admin'],function(){
    Route::group(['prefix'=>'login/admin','middleware'=>'CheckLogedIn'],function(){
        Route::get('/','LoginController@getLogin')->name('getLogin');
        
        Route::post('/','LoginController@postLogin')->name('postLogin');
    });
    Route::get('logout/admin','HomeController@getLogout');
    Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
        Route::get('home','HomeController@getHome');
        Route::group(['prefix'=>'category'],function(){
            Route::get('/','CategorysController@getCate');
            Route::get('edit','CategorysController@getEditCate');
        });
        Route::group(['prefix'=>'category'],function(){
			Route::get('/','CategorysController@getCate');
			Route::post('/','CategorysController@postCate');
			Route::get('edit/{id}','CategorysController@getEditCate');
			Route::post('edit/{id}','CategorysController@postEditCate');
			Route::get('delete/{id}','CategorysController@getDeleteCate');
		});
		Route::group(['prefix'=>'subcategory'],function(){
			Route::get('/','SubCategoryController@getSubCate');
			Route::get('add','SubCategoryController@getAddSubCate');
			Route::post('add','SubCategoryController@postAddSubCate');
			Route::get('edit/{id}','SubCategoryController@getEditSubCate');
			Route::post('edit/{id}','SubCategoryController@postEditSubCate');
			Route::get('delete/{id}','SubCategoryController@getDeleteSubCate');
		});

		Route::group(['prefix'=>'product'],function(){
			Route::get('/','ProductController@getProduct');
			Route::get('add','ProductController@getAddProduct');
			Route::post('add','ProductController@postAddProduct');
			Route::get('edit/{id}','ProductController@getEditProduct');
			Route::post('edit/{id}','ProductController@postEditProduct');
			Route::get('delete/{id}','ProductController@getDeleteProduct');
		});
    });
});

		
Route::get('/home', 'HomeController@index')->name('home');
Route::get('homepage', 'FrontController@homepage');
Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
Route::get('register', 'FrontController@getRegister');
Route::post('register', 'FrontController@postRegister');
Route::get('login', 'FrontController@getlogin');
Route::post('login', 'FrontController@postlogin');
Route::get('logout', 'FrontController@logout');
Route::get('product', 'FrontController@products');
Route::get('product-Detail/{id}', [
		'as' => 'productDetail',
		'uses' => 'FrontController@productDetail'
]);


