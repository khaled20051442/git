<?php
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
  
Route::namespace('Admin')->group(function(){
    //my routes

    Route::resource('client','ClientController');

    Route::resource('applCourse','CourseApplicantController');

    Route::resource('clinetMessage','ClientMessageController');

    Route::resource('country', 'CountryController');

    Route::resource('venue', 'VenueController');

    Route::resource('testmonile', 'TestmonileController');

    Route::resource('testImg', 'TestImgController');

    Route::resource('courses', 'CoursesController');
    // dynamicdependentCat.fetch
    Route::post('dynamicdependentCat/fetch' ,'CoursesController@fetchData')->name('dynamicdependentCat.fetch');

    



    
});