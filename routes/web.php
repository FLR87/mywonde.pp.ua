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

Route::get('/', 'IndexController@index');

//Route::get('/news/{short_name?}', 'NewsController@shownews');
//Route::get('/category/{short_name}', 'NewsController@shownewsBycat');
//Route::get('/news/{short_category_name?}', 'NewsController@showNewsByCat');

Route::get('/news/{short_category_name?}', 'NewsController@index');
Route::get('/news/{short_category_name}/{short_name}', 'NewsController@showNews');

Route::post('/comment/store', array( "as" => "comment.store", "uses" => "CommentController@store"));
Route::get('/feedback', array( "as" => "feedback", "uses" => "FeedbackController@index"));
Route::post('/feedback/store', array( "as" => "feedback.store", "uses" => "FeedbackController@store"));

Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
    'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('fileentry/add',[
    'as' => 'addentry', 'uses' => 'FileEntryController@add']);

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    Route::resource('news','Admin\NewsController');
    Route::get('fileentry', 'Admin\FileEntryController@index');
    Route::post('fileentry/addImg2Ban',[
        'as' => 'addImg2Ban', 'uses' => 'Admin\FileEntryController@addImg2Ban']);
});


Route::get('/home', 'HomeController@index')->name('home');
