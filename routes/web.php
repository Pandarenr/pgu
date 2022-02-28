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
Route::get('/about/employees', 'AppController@employees')->name('employees');
Route::get('/about/goals', 'AppController@goals')->name('goals');
Route::get('/documents', 'DocumentController@index')->name('docs');

Route::prefix('programs')->group(function(){
    Route::get('/','ProgramController@index')->name('catalog-program');
    Route::get('/{program_id}','ProgramController@detail')->name('detail-program');
});

Route::middleware('auth')->group(function(){
    Route::middleware('permission:listener-own-request-edit')->group(function(){
        Route::get('/programs/{program_id}/listener-request','ListenerRequestController@showCreateForm')->name('create-form-listener-request');
        Route::post('/programs/{program_id}/listener-request','ListenerRequestController@store')->name('create-listener-request');

        Route::get('/listener-requests','ListenerrequestController@list')->name('list-listener-requests');
        Route::get('/listener-requests/{listener_request_id}','ListenerRequestController@detail')->name('detail-listener-request');
        Route::get('/listener-requests/{listener_request_id}/edit','ListenerRequestController@showEditForm')->name('edit-listener-request');
        Route::post('/listener-requests/{listener_request_id}','ListenerRequestController@save')->name('save-listener-request');
        Route::delete('/listener-requests/{listener_request_id}','ListenerRequestController@delete')->name('delete-listener-request');
    });

    Route::get('/profile','UserController@userProfile')->name('user-profile');
    Route::get('/profile/edit','UserController@showEditForm')->name('edit-user-profile');
    Route::post('/profile/edit','UserController@save')->name('save-user-profile');
    Route::get('/profile/change-password','UserController@showPasswordEditForm')->name('edit-user-password');
    Route::post('/profile/change-password','UserController@passwordSave')->name('save-user-password');
});

Route::prefix('admin')->middleware('role:admin')->group(function(){
    Route::get('/programs','AdminProgramController@index')->name('admin-list-programs');
    Route::get('/programs/create','AdminProgramController@showCreateForm')->name('admin-create-form-program');
    Route::post('/programs/create','AdminProgramController@store')->name('admin-create-program');
    Route::get('/programs/{program_id}','AdminProgramController@detail')->name('admin-detail-program');
    Route::get('/programs/{program_id}/edit','AdminProgramController@showEditForm')->name('admin-edit-form-program');
    Route::post('/programs/{program_id}/edit','AdminProgramController@save')->name('admin-edit-program');
    Route::delete('/programs/{program_id}','AdminProgramController@delete')->name('admin-delete-program');

    Route::get('/posts','AdminPostController@index')->name('admin-list-posts');
    Route::get('/posts/create','AdminPostController@showCreateForm')->name('admin-create-form-post');
    Route::post('/posts/create','AdminPostController@store')->name('admin-create-post');
    Route::get('/posts/{post_id}','AdminPostController@detail')->name('admin-detail-post');
    Route::get('/posts/{post_id}/edit','AdminPostController@showEditForm')->name('admin-edit-form-post');
    Route::post('/posts/{post_id}/edit','AdminPostController@save')->name('admin-edit-post');
    Route::delete('/posts/{post_id}','AdminPostController@delete')->name('admin-delete-post');

    Route::get('/users','AdminUserController@index')->name('admin-list-users');
    Route::get('/users/create','AdminUserController@showCreateForm')->name('admin-create-form-user');
    Route::post('/users/create','AdminUserController@store')->name('admin-create-user');
    Route::get('/users/{user_id}','AdminUserController@detail')->name('admin-detail-user');
    Route::get('/users/{user_id}/edit','AdminUserController@showEditForm')->name('admin-edit-form-user');
    Route::post('/users/{user_id}/edit','AdminUserController@save')->name('admin-edit-user');
    Route::delete('/users/{user_id}','AdminUserController@delete')->name('admin-delete-user');

    Route::get('/program-categories','AdminProgramCategoryController@index')->name('admin-list-program-categories');
    Route::get('/program-categories/create','AdminProgramCategoryController@showCreateForm')->name('admin-create-form-program-category');
    Route::post('/program-categories/create','AdminProgramCategoryController@store')->name('admin-create-program-category');
    Route::get('/program-categories/{program_category_id}','AdminProgramCategoryController@detail')->name('admin-detail-program-category');
    Route::get('/program-categories/{program_category_id}/edit','AdminProgramCategoryController@showEditForm')->name('admin-edit-form-program-category');
    Route::post('/program-categories/{program_category_id}/edit','AdminProgramCategoryController@save')->name('admin-edit-program-category');
    Route::delete('/program-categories/{program_category_id}','AdminProgramCategoryController@delete')->name('admin-delete-program-category');

    Route::get('/documents','AdminDocumentController@index')->name('admin-list-documents');
    Route::get('/documents/create','AdminDocumentController@showCreateForm')->name('admin-create-form-document');
    Route::post('/documents/create','AdminDocumentController@store')->name('admin-create-document');
    Route::get('/documents/{document_id}','AdminDocumentController@detail')->name('admin-detail-document');
    Route::get('/documents/{document_id}/edit','AdminDocumentController@showEditForm')->name('admin-edit-form-document');
    Route::post('/documents/{document_id}/edit','AdminDocumentController@save')->name('admin-edit-document');
    Route::delete('/documents/{document_id}','AdminDocumentController@delete')->name('admin-delete-document');

    Route::get('/listeners-requests','AdminListenerRequestController@index')->name('admin-list-listeners-requests');
    Route::get('/listeners-requests/create','AdminListenerRequestController@showCreateForm')->name('admin-create-form-listener-request');
    Route::post('/listeners-requests/create','AdminListenerRequestController@store')->name('admin-create-listener-request');
    Route::get('/listeners-requests/{listener_request_id}','AdminListenerRequestController@detail')->name('admin-detail-listener-request');
    Route::get('/listeners-requests/{listener_request_id}/edit','AdminListenerRequestController@showEditForm')->name('admin-edit-form-listener-request');
    Route::post('/listeners-requests/{listener_request_id}/edit','AdminListenerRequestController@save')->name('admin-edit-listener-request');
    Route::delete('/listeners-requests/{listener_request_id}','AdminListenerRequestController@delete')->name('admin-delete-listener-request');
});

require __DIR__.'/auth.php';
