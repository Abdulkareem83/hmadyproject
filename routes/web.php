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

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeCtrl@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    //
    Route::get('profile', 'AccountCtrl@showProfilePage')->name('profile');

    Route::group(['middleware' => 'teacher'], function(){
    	Route::get('dashboard', 'DashboardCtrl@index')->name('dashboard');

    	/* Course Module */
    	Route::get('courses/all', 'CoursesCtrl@index')->name('all-courses');
    	Route::get('courses/create', 'CoursesCtrl@createCourse')->name('create-course');
    	Route::post('store-course', 'CoursesCtrl@storeCourse');
    	Route::get('courses/edit/{id}', 'CoursesCtrl@editCourse')->name('edit-course');
    	Route::post('save-course', 'CoursesCtrl@saveCourse');
    	Route::get('courses/delete', 'CoursesCtrl@deleteCourse');
    	Route::get('courses/show/{id}', 'CoursesCtrl@showCourse')->name('show-course');

    	/* Chapter Module */
    	Route::get('chapters/all/{courseId}', 'ChapterCtrl@index')->name('all-chapters');
    	Route::get('chapters/create/{courseId}', 'ChapterCtrl@create')->name('create-chapter');
    	Route::post('store-chapter', 'ChapterCtrl@storeChapter');
    	Route::get('chapters/edit/{id}', 'ChapterCtrl@editChapter')->name('edit-chapter');
    	Route::post('save-chapter', 'ChapterCtrl@saveChapter');
    	Route::get('chapters/delete', 'ChapterCtrl@deleteChapter');

    	/* VideoCtrl */
    	Route::get('videos/all/{chapterId}', 'VideoCtrl@index')->name('all-videos');
    	Route::get('videos/create/{chapterId}', 'VideoCtrl@create')->name('create-video');
    	Route::post('store-video', 'VideoCtrl@storeVideo');
    	Route::get('videos/edit/{id}', 'VideoCtrl@editVideo')->name('edit-video');
    	Route::post('save-video', 'VideoCtrl@saveVideo');
    	Route::get('videos/delete', 'VideoCtrl@deleteVideo');
    });
});