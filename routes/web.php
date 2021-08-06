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
use \App\Http\Controllers\client\ClientJobsController;
use \App\Http\Controllers\client\ClientProgressController;
use \App\Http\Controllers\client\ClientReviewController;
use \App\Http\Controllers\client\ClientSubmissionController;
use \App\Http\Controllers\client\ClientRevisionController;
use \App\Http\Controllers\client\ClientBidsController;
use \App\Http\Controllers\client\ClientAssignedController;

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
use App\Http\Controllers\Writer\EvaluationController;
use App\Http\Controllers\Writer\WriterAmendController;
use App\Http\Controllers\Writer\WriterAssignedController;


use App\Http\Controllers\Admin\AdminFaqsController;
use App\Http\Controllers\Admin\FaqStatus;
use App\Http\Controllers\Admin\AdminPolicyController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\ResponseController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\AdminDisciplineController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminProgressController;
use App\Http\Controllers\Admin\AdminEvaluationController;
use App\Http\Controllers\Admin\AdminSubmittedController;
use App\Http\Controllers\Admin\AdminRevisionController;
use App\Http\Controllers\Admin\AdminBidsController;
use App\Http\Controllers\Admin\AdminInvoiceController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminCostingController;

use \App\Http\Controllers\General\ContactController;
use \App\Http\Controllers\General\TermsController;
use \App\Http\Controllers\General\PrivacyController;
use \App\Http\Controllers\General\SupportController;
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
    Route::resource('admin/task/progress', AdminProgressController::class);
    Route::resource('admin/task/completed', AdminSubmittedController::class);
    Route::resource('admin/task/revision', AdminRevisionController::class);
    Route::resource('admin/task/asses', AdminEvaluationController::class);
    Route::resource('admin/task/bids', AdminBidsController::class);
    Route::resource('admin/homepage/costing', AdminCostingController::class);
    Route::resource('admin/homepage/invoice', AdminInvoiceController::class);
    Route::resource('admin/invoice/order', AdminOrderController::class);
    Route::patch('frequent/{id}', ['as'=>'frequent', 'uses'=>FaqStatus::class]);
    Route::patch('response/{id}', ['as'=>'response', 'uses'=>ResponseController::class]);
    Route::patch('note/{id}', ['as'=>'note', 'uses'=>NoteController::class]);
    Route::patch('admin/task/assign/{id}',  [AdminProjectController::class, 'assign'])->name('assign');
    Route::delete('admin/task/unassign/{id}',  [AdminProjectController::class, 'unassign'])->name('unassign');
});
// client controller
Route::group(['middleware'=>'auth'], function (){
    Route::resource('dashboard', ClientController::class);
    Route::resource('dashboard/jobs/awaiting', ClientProgressController::class);
    Route::resource('dashboard/jobs/checking', ClientReviewController::class);
    Route::resource('dashboard/jobs/complete', ClientSubmissionController::class);
    Route::resource('dashboard/jobs/returned', ClientRevisionController::class);
    Route::resource('dashboard/jobs/market', ClientBidsController::class);
    Route::resource('dashboard/jobs/assigned', ClientAssignedController::class);
    Route::get('/{waiting}',['as'=>'waiting', 'uses'=>RedirectController::class])->name('page')
        ->where('waiting','wait|congratulations|deactivated');
    Route::resource('dashboard/homepage/jobs', ClientJobsController::class);
    Route::patch('dashboard/jobs/accept/{id}',  [ClientJobsController::class, 'accept'])->name('accept');
    Route::delete('dashboard/jobs/reject/{id}',  [ClientJobsController::class, 'reject'])->name('reject');

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
    Route::resource('freelancer/project/evaluation', EvaluationController::class);
    Route::resource('freelancer/project/amend', WriterAmendController::class);
    Route::post('bidding', ['as'=>'bidding', 'uses'=>BiddingController::class]);
    Route::resource('freelancer/homepage/project',  WriterProjectController::class);
    Route::resource('freelancer/project/allocated',  WriterAssignedController::class);
    Route::get('freelancer/project/categories/{id}',  [WriterProjectController::class, 'filters'])->name('filters');
    Route::get('freelancer/project/filtered',  FilterController::class)->name('filter');

});
//General controllers-serves all general pages
Route::group([], function (){
   Route::resource('contact', ContactController::class);
    Route::resource('/', MainController::class);
    Route::resource('terms_condition', TermsController::class);
    Route::resource('privacy', PrivacyController::class);
    Route::resource('support', SupportController::class);
    Route::get('about-us',  [MainController::class, 'about'])->name('about');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
