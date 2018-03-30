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
    Route::group(['prefix'=>'logins','middleware'=>'CheckLogedIn'],function(){
        Route::get('/','LoginController@getLogin')->name('getLogin');
        
        Route::post('/','LoginController@postLogin')->name('postLogin');
    });
    Route::get('logouts','HomeController@getLogout');

    Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
        Route::get('homes','HomeController@getHome');

        Route::group(['prefix'=>'user','middleware'=>'CheckLogedOut'],function(){
        Route::get('/',['as'=>'showuser','uses'=>'UserController@getUser']);
        Route::get('add','UserController@getAddUser');
        Route::post('add','UserController@postAddUser');
        Route::get('edit/{id}','UserController@getEditUser');
        Route::post('edit/{id}','UserController@postEditUser');
        Route::get('delete/{id}',['as'=>'getDeleteUser','uses'=>'UserController@getDeleteUser']);
    	});

       
        Route::group(['prefix'=>'category'],function(){
			Route::get('/','CategorysController@getCate');
			Route::post('/',['as'=>'postCate','uses'=>'CategorysController@postCate']);
			Route::get('edit/{id}','CategorysController@getEditCate');
			Route::post('edit/{id}','CategorysController@postEditCate');
			Route::get('delete/{id}','CategorysController@getDeleteCate');
		});
		Route::group(['prefix'=>'subcategory'],function(){
			Route::get('/',['as'=>'showsubcate','uses'=>'SubCategoryController@getSubCate']);
			Route::get('add','SubCategoryController@getAddSubCate');
			Route::post('add','SubCategoryController@postAddSubCate');
			Route::get('edit/{id}','SubCategoryController@getEditSubCate');
			Route::post('edit/{id}','SubCategoryController@postEditSubCate');
			Route::get('delete/{id}',['as'=>'getsubdel','uses'=>'SubCategoryController@getDeleteSubCate']);
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

Route::get('checkout', 'CartController@checkout');
Route::post('checkout', 'CartController@postcheckout');
Route::get('thanks', 'CartController@thanks');
//cart
Route::post('cart/add', 'CartController@addItem');
Route::get('cart', 'CartController@index');
Route::post('updateCart','CartController@updateCart');
Route::post('updateCart/{id}/{qty}','CartController@updateCart');
Route::get('delCart/{id}', 'CartController@deleteCart');
Route::post('seach','FrontController@seach');

Route::get('send', 'FrontController@getmail');
Route::get('catpro/{id}',  [
        'as' => 'SubProduct',
        'uses' => 'FrontController@getcatpro'
    ]);
Route::post('/comment', 'FrontController@postComment');



