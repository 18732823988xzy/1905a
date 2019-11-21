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


Route::view('/xzy','hh');
Route::post('/doform',function (){
    $post=request()->post();
    dd($post);
});

//Route::redirect('/reg','/xzy');
Route::get('/goods/{goods_id}',function ($goods_id){
    echo $goods_id;
});
//Route::get('/aa/{c_id}/{cname}',function($c_id,$cname){
//    echo $c_id;
//    echo $cname;
//})->where(['c_id'=>'[0-9]+','cname'=>'\d']);
Route::domain('admin.xzy.com')->group(function () {
    Route::prefix('brand')->group(function () {
        //品牌
        Route::get('create', 'admin\BrandController@create');
        Route::post('store', 'admin\BrandController@store');
        Route::get('Index', 'admin\BrandController@Index');
        Route::get('delete/{brand_id}', 'admin\BrandController@destroy');
        Route::get('edit/{brand_id}', 'admin\BrandController@edit');
        Route::post('update/{brand_id}', 'admin\BrandController@update');
    });
    Route::prefix('goods')->group(function () {
        //商品
        Route::get('create', 'admin\GoodsController@create');
        Route::post('store', 'admin\GoodsController@store');
        Route::get('Index', 'admin\GoodsController@Index');
        Route::get('delete/{goods_id}', 'admin\GoodsController@destroy');
        Route::get('edit/{goods_id}', 'admin\GoodsController@edit');
        Route::post('update/{goods_id}', 'admin\GoodsController@update');
    });
    //Auth::routes();

    //Route::get('/home', 'HomeController@Index')->name('home');
    Route::prefix('news')->group(function () {
        Route::get('create', 'admin\NewsController@create');
        Route::post('store', 'admin\NewsController@store');
        Route::get('Index', 'admin\NewsController@Index');
        Route::get('delete/{news_id}', 'admin\NewsController@destroy');
        Route::get('edit/{news_id}', 'admin\NewsController@edit');
    });
});




Route::get('/','Index\IndexController@Index');
Route::get('/send','Index\LoginController@send');
Route::view('/index','Index.index.index');
Route::view('/reg','Index.index.reg');