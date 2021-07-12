<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminClientController;
use \App\Http\Controllers\Admin\DisableUser;
use \App\Http\Controllers\Allusers\ProfileController;
use \App\Http\Controllers\Allusers\ChangePasswordController;
use \App\Http\Controllers\Admin\AdminWriterController;
use \App\Http\Controllers\client\ClientController;
use App\Http\Controllers\Allusers\RedirectController;
use App\Http\Controllers\Admin\AdminExamController;
use App\Http\Controllers\Admin\AdminEssayController;
use App\Http\Controllers\Writer\WriterRegistrationController;
use App\Http\Controllers\Writer\RegistrationPages;
use App\Http\Controllers\Writer\EnglishTestController;
use App\Http\Controllers\Writer\EssayTestController;



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
    return view('welcome');
});
Route::group(['middleware'=>'auth'], function (){
    Route::resource('admin', AdminController::class);
    Route::resource('admin/homepage/user', AdminUserController::class);
    Route::resource('admin/homepage/client', AdminClientController::class);
    Route::patch('disable/{id}',['as'=>'disable', 'uses'=>DisableUser::class]);
    Route::patch('pass/{id}',['as'=>'pass', 'uses'=>ChangePasswordController::class]);
    Route::post('/profile',['as'=>'profile', 'uses'=>ProfileController::class]);
    Route::resource('admin/homepage/writer', AdminWriterController::class);
    Route::resource('admin/homepage/exam', AdminExamController::class);
    Route::resource('admin/homepage/essay', AdminEssayController::class);
});

Route::group(['middleware'=>'auth'], function (){
    Route::resource('dashboard', ClientController::class);
    Route::get('dashboard/wait',['as'=>'redirect_client', 'uses'=>RedirectController::class]);
});
//writer routes
Route::group(['middleware'=>'auth'], function (){
    Route::get('registration/writer_details',['as'=>'detailing', 'uses'=>RegistrationPages::class]);
});
//writer roots without auth
Route::group([], function (){
    Route::resource('registration', WriterRegistrationController::class);
    Route::resource('english_test', EnglishTestController::class);
    Route::resource('essay_test', EssayTestController::class);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
