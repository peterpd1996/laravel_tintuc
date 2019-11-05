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
    return view('/fontend/layouts/index');
});
Route::get('admin/dangnhap','UserController@getlogin');
Route::post('admin/dangnhap', 'UserController@postlogin');
Route::get('admin/dangxuat', 'UserController@logout');

Route::group(['prefix' => 'admin','middleware'=>'adminlogin'], function() {
    // the loai
    Route::group(['prefix' => 'theloai'], function() {
    	Route::get('/','TheLoaiController@index');
        Route::get('/index','TheLoaiController@index');

        Route::get('/add','TheLoaiController@add');
        Route::post('/add','TheLoaiController@saveAdd');

        Route::get('/edit/{TheLoai}','TheLoaiController@edit');
        Route::post('edit','TheLoaiController@editSave');

        Route::get('delete/{TheLoai}', 'TheLoaiController@delete');
    });
    // loai tin
    Route::group(['prefix' => 'loaitin'], function() {
        Route::get('/','LoaiTinController@index');
        Route::get('/index','LoaiTinController@index');

        Route::get('/add','LoaiTinController@add');
        Route::post('/add','LoaiTinController@saveAdd');

        Route::get('/edit/{LoaiTin}','LoaiTinController@edit');
        Route::post('/edit','LoaiTinController@editSave');

        Route::get('/delete/{LoaiTin}', 'LoaiTinController@delete');
    });

    // tin tuc
    Route::group(['prefix' => 'tintuc'], function() {
        Route::get('/','TinTucController@index');
        Route::get('/index','TinTucController@index');

        Route::get('/add','TinTucController@add');
        Route::post('/add','TinTucController@saveAdd');

        Route::get('/edit/{TinTuc}','TinTucController@edit');
        Route::post('/edit/{TinTuc}','TinTucController@editSave');

        Route::get('/delete/{TinTuc}', 'TinTucController@delete');
        // ajax
        Route::get('/getLoaiTinFromIdTheLoai','TinTucController@getTheLoai');
        
    });
    // user
    Route::group(['prefix' => 'users'], function() {
        Route::get('/index','UserController@index');
        
    });
    // slide
    Route::group(['prefix' => 'slide'], function() {
        Route::get('/index','SlideController@index');
        Route::get('/add','SlideController@add');
        Route::get('/edit','SlideController@edit');
    });



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
