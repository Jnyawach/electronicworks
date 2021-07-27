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
use App\Http\Controllers\Admin\AdminApplicationController;
use App\Http\Controllers\Writer\WriterRegistrationController;
use App\Http\Controllers\Writer\RegistrationPages;
use App\Http\Controllers\Writer\EnglishTestController;
use App\Http\Controllers\Writer\EssayTestController;
use App\Http\Controllers\Writer\WriterController;
use App\Http\Controllers\Writer\WriterProjectController;
use App\Http\Controllers\Writer\FilterController;
use App\Http\Controllers\Writer\BiddingController;
use App\Http\Controllers\Writer\PendingProjectController;

use App\Http\Controllers\Admin\AdminFaqsController;
use App\Http\Controllers\Admin\FaqStatus;
use App\Http\Controllers\Admin\AdminPolicyController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\ResponseController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\AdminDisciplineController;
use App\Http\Controllers\Admin\AdminProjectController;
use \App\Http\Controllers\General\ContactController;
use \App\Http\Controllers\MainController;



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


//admin routes
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
    Route::resource('admin/homepage/application', AdminApplicationController::class);
    Route::resource('admin/homepage/faqs', AdminFaqsController::class);
    Route::resource('admin/homepage/policy', AdminPolicyController::class);
    Route::resource('admin/homepage/support', AdminContactController::class);
    Route::resource('admin/homepage/notifications', AdminNotificationController::class);
    Route::resource('admin/homepage/discipline', AdminDisciplineController::class);
    Route::resource('admin/homepage/task', AdminProjectController::class);
    Route::patch('frequent/{id}', ['as'=>'frequent', 'uses'=>FaqStatus::class]);
    Route::patch('response/{id}', ['as'=>'response', 'uses'=>ResponseController::class]);
    Route::patch('note/{id}', ['as'=>'note', 'uses'=>NoteController::class]);
    Route::patch('admin/task/assign/{id}',  [AdminProjectController::class, 'assign'])->name('assign');
});

Route::group(['middleware'=>'auth'], function (){
    Route::resource('dashboard', ClientController::class);
    Route::get('/{waiting}',['as'=>'waiting', 'uses'=>RedirectController::class])->name('page')
        ->where('waiting','wait|congratulations|deactivated');;
});
//writer routes
Route::group(['middleware'=>'auth'], function (){
    Route::get('registration/writer_details',['as'=>'detailing', 'uses'=>RegistrationPages::class]);
});
//writer roots with auth
Route::group([], function (){
    Route::resource('registration', WriterRegistrationController::class);
    Route::resource('english_test', EnglishTestController::class);
    Route::resource('essay_test', EssayTestController::class);
    Route::resource('freelancer', WriterController::class);
    Route::resource('freelancer/project/pending', PendingProjectController::class);
    Route::post('bidding', ['as'=>'bidding', 'uses'=>BiddingController::class]);
    Route::resource('freelancer/homepage/project',  WriterProjectController::class);
    Route::get('freelancer/project/categories/{id}',  [WriterProjectController::class, 'filters'])->name('filters');
    Route::get('freelancer/project/filtered',  FilterController::class)->name('filter');

});
//General controllers-serves all general pages
Route::group([], function (){
   Route::resource('contact', ContactController::class);
    Route::resource('/', MainController::class);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
