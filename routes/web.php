<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'AppController@home')->name('home');
Route::get('/about', 'AppController@about')->name('about');

Route::get('/documents', 'DocumentController@index')->name('documents-index');
Route::get('/documents/{document_id}','DocumentController@open')->name('document-open');
Route::get('/documents/{document_id}/download','DocumentController@download')->name('document-download');

Route::prefix('programs')->group(function(){
    Route::get('/','ProgramController@index')->name('programs-index');
    Route::get('/{program_id}','ProgramController@detail')->name('program-detail');
});

// Authorized Users
// Can make review and edit profile

Route::middleware('auth')->group(function(){
    Route::middleware('permission:listener-own-request-edit')->group(function(){
        Route::get('/review/create','ReviewController@create')->name('review-create');
        Route::post('/review/create','ReviewController@store')->name('review-store');
        Route::get('/review/{request_id}/detail','ReviewController@detail')->name('review-detail');
        Route::get('/review/{request_id}/edit','ReviewController@edit')->name('review-edit');
        Route::post('/review/{request_id}/save','ReviewController@save')->name('review-save');
        Route::delete('/review/{request_id}','ReviewController@delete')->name('review-delete');
    });

    Route::get('/profile','UserController@detail')->name('profile-detail');
    Route::get('/profile/edit','UserController@edit')->name('profile-edit');
    Route::post('/profile/edit','UserController@save')->name('profile-save');
});

// Admin Panel

Route::prefix('admin')->middleware('role:admin')->group(function(){
    Route::get('/panel','Admin\AdminController@index')->name('admin-panel');

    Route::get('/programs','Admin\AdminProgramController@index')->name('admin-programs-index');
    Route::get('/programs/create','Admin\AdminProgramController@create')->name('admin-program-create');
    Route::post('/programs/create','Admin\AdminProgramController@store')->name('admin-program-store');
    Route::get('/programs/{program_id}','Admin\AdminProgramController@detail')->name('admin-program-detail');
    Route::get('/programs/{program_id}/edit','Admin\AdminProgramController@edit')->name('admin-program-edit');
    Route::post('/programs/{program_id}/edit','Admin\AdminProgramController@save')->name('admin-program-save');
    Route::delete('/programs/{program_id}','Admin\AdminProgramController@delete')->name('admin-program-delete');

    Route::get('/education-forms','Admin\AdminEducationFormController@index')->name('admin-educationforms-index');
    Route::get('/education-forms/create','Admin\AdminEducationFormController@create')->name('admin-educationform-create');
    Route::post('/education-forms/create','Admin\AdminEducationFormController@store')->name('admin-educationform-store');
    Route::get('/education-forms/{education_form_id}','Admin\AdminEducationFormController@edit')->name('admin-educationform-edit');
    Route::post('/education-forms/{education_form_id}','Admin\AdminEducationFormController@save')->name('admin-educationform-save');
    Route::post('/education-forms/delete/{education_form_id}','Admin\AdminEducationFormController@delete')->name('admin-educationform-delete');

    Route::get('/listener-categories','Admin\AdminListenerCategoryController@index')->name('admin-listenercategories-index');
    Route::get('/listener-categories/create','Admin\AdminListenerCategoryController@create')->name('admin-listenercategory-create');
    Route::post('/listener-categories/create','Admin\AdminListenerCategoryController@store')->name('admin-listenercategory-store');
    Route::get('/listener-categories/{education_form_id}','Admin\AdminListenerCategoryController@edit')->name('admin-listenercategory-edit');
    Route::post('/listener-categories/{education_form_id}','Admin\AdminListenerCategoryController@save')->name('admin-listenercategory-save');
    Route::delete('/listener-categories/{education_form_id}','Admin\AdminListenerCategoryController@delete')->name('admin-listenercategory-delete');

    Route::get('/program-categories','Admin\AdminProgramCategoryController@index')->name('admin-programcategories-index');
    Route::get('/program-categories/create','Admin\AdminProgramCategoryController@create')->name('admin-programcategory-create');
    Route::post('/program-categories/create','Admin\AdminProgramCategoryController@store')->name('admin-programcategory-store');
    Route::get('/program-categories/{education_form_id}','Admin\AdminProgramCategoryController@edit')->name('admin-programcategory-edit');
    Route::post('/program-categories/{education_form_id}','Admin\AdminProgramCategoryController@save')->name('admin-programcategory-save');
    Route::delete('/program-categories/{education_form_id}','Admin\AdminProgramCategoryController@delete')->name('admin-programcategory-delete');

    Route::get('/users','Admin\AdminUserController@index')->name('admin-users-index');
    Route::get('/users/{user_id}','Admin\AdminUserController@detail')->name('admin-user-detail');
    Route::delete('/users/{user_id}','Admin\AdminUserController@delete')->name('admin-user-delete');

    Route::get('/documents','Admin\AdminDocumentController@index')->name('admin-documents-index');
    Route::get('/documents/upload','Admin\AdminDocumentController@uploadForm')->name('admin-document-upload');
    Route::post('/documents/upload','Admin\AdminDocumentController@store')->name('admin-document-store');
    Route::delete('/documents/{document_id}','Admin\AdminDocumentController@delete')->name('admin-document-delete');

    Route::get('/reviews','Admin\AdminReviewController@index')->name('admin-requests-index');
    Route::get('/reviews/{review_id}','Admin\AdminReviewController@edit')->name('admin-request-detail');
    Route::get('/reviews/create','Admin\AdminReviewController@create')->name('admin-request-create');
    Route::post('/reviews/create','Admin\AdminReviewController@store')->name('admin-request-store');
    Route::get('/reviews/{review_id}/edit','Admin\AdminReviewController@edit')->name('admin-request-edit');
    Route::post('/reviews/{review_id}/edit','Admin\AdminReviewController@save')->name('admin-request-save');
    Route::delete('/reviews/{review_id}','Admin\AdminReviewController@delete')->name('admin-request-delete');
});

require __DIR__.'/auth.php';
