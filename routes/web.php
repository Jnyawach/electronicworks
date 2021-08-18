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
use \App\Http\Controllers\client\ClientInvoiceController;

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
use App\Http\Controllers\Writer\WriterAccountController;


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
use App\Http\Controllers\Admin\AdminPreassignedController;
use App\Http\Controllers\Admin\AdminLedgerController;
use App\Http\Controllers\Admin\AdminWithdrawalController;

use \App\Http\Controllers\General\ContactController;
use \App\Http\Controllers\General\TermsController;
use \App\Http\Controllers\General\PrivacyController;
use \App\Http\Controllers\General\SupportController;
use \App\Http\Controllers\General\CheckComplete;
use \App\Http\Controllers\General\CheckNotPaid;
use \App\Http\Controllers\MainController;

use \App\Http\Controllers\Manager\ManagerController;
use \App\Http\Controllers\Manager\ManagerUserController;
use \App\Http\Controllers\Manager\ManagerApplicationController;
use \App\Http\Controllers\Manager\ManagerProjectController;
use \App\Http\Controllers\Manager\ManagerBiddingController;
use \App\Http\Controllers\Manager\ManagerAssignedController;
use \App\Http\Controllers\Manager\ManagerProgressController;
use \App\Http\Controllers\Manager\ManagerAssesController;
use \App\Http\Controllers\Manager\ManagerRevisionController;
use \App\Http\Controllers\Manager\ManagerCompletedController;
use \App\Http\Controllers\Manager\ManagerEnglishController;
use \App\Http\Controllers\Manager\ManagerEssayController;
use \App\Http\Controllers\Manager\ManagerDisciplineController;
use \App\Http\Controllers\Manager\ManagerNotificationController;
use \App\Http\Controllers\Manager\ManagerContactController;
use \App\Http\Controllers\Manager\ManagerFaqController;
use \App\Http\Controllers\Manager\ManagerStatementController;
use \App\Http\Controllers\Manager\ManagerOrdersController;



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
    Route::resource('admin/task/set', AdminPreassignedController::class);
    Route::resource('admin/homepage/costing', AdminCostingController::class);
    Route::resource('admin/homepage/invoice', AdminInvoiceController::class);
    Route::get('admin/accounts/order/unpaid',  [AdminOrderController::class, 'unpaid'])->name('unpaid');
    Route::get('admin/accounts/order/paid',  [AdminOrderController::class, 'paid'])->name('paid');
    Route::get('admin/accounts/order/refund',  [AdminOrderController::class, 'refund'])->name('refund');
    Route::resource('admin/accounts/order', AdminOrderController::class);
    Route::resource('admin/accounts/withdrawal', AdminWithdrawalController::class);
    Route::resource('admin/homepage/accounts', AdminLedgerController::class);
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
    Route::get('dashboard/client-invoice/client-unpaid',  [ClientInvoiceController::class, 'client_unpaid'])->name('client-unpaid');
    Route::get('dashboard/client-invoice/client-paid',  [ClientInvoiceController::class, 'client_paid'])->name('client-paid');
    Route::get('dashboard/client-invoice/client-refund',  [ClientInvoiceController::class, 'client_refund'])->name('client-refund');
    Route::resource('dashboard/homepage/client-invoice', ClientInvoiceController::class);
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
    Route::get('freelancer/finances/writer-unpaid',  [WriterAccountController::class, 'writerUnpaid'])->name('writer-unpaid');
    Route::get('freelancer/finances/writer-paid',  [WriterAccountController::class, 'writerPaid'])->name('writer-paid');
    Route::get('freelancer/finances/writer-refund',  [WriterAccountController::class, 'writerRefund'])->name('writer-refund');
    Route::resource('freelancer/homepage/finances', WriterAccountController::class);
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
    Route::resource('help-and-support', SupportController::class);
    Route::get('about-us',  [MainController::class, 'about'])->name('about');
    Route::patch('response/{id}', ['as'=>'response', 'uses'=>ResponseController::class]);
    Route::patch('note/{id}', ['as'=>'note', 'uses'=>NoteController::class]);
    Route::patch('frequent/{id}', ['as'=>'frequent', 'uses'=>FaqStatus::class]);
    Route::patch('mark/{id}',['as'=>'mark', 'uses'=>CheckComplete::class]);
    Route::patch('unmark/{id}',['as'=>'unmark', 'uses'=>CheckNotPaid::class]);
    Route::patch('pass/{id}',['as'=>'pass', 'uses'=>ChangePasswordController::class]);
    Route::post('/profile',['as'=>'profile', 'uses'=>ProfileController::class]);
});

// manager controller
Route::group([], function (){
    Route::resource('manager', ManagerController::class);
    Route::resource('manager/homepage/author', ManagerUserController::class);
    Route::resource('manager/homepage/work', ManagerProjectController::class);
    Route::resource('manager/homepage/manager-discipline', ManagerDisciplineController::class);
    Route::resource('manager/homepage/manager-notification', ManagerNotificationController::class);
    Route::resource('manager/homepage/manager-contact', ManagerContactController::class);
    Route::resource('manager/homepage/manager-faqs', ManagerFaqController::class);
    Route::resource('manager/work/manager_bidding', ManagerBiddingController::class);
    Route::resource('manager/work/manager-assigned', ManagerAssignedController::class);
    Route::resource('manager/work/manager-progress', ManagerProgressController::class);
    Route::resource('manager/work/manager-asses', ManagerAssesController::class);
    Route::resource('manager/work/manager-revision', ManagerRevisionController::class);
    Route::resource('manager/work/manager-completed', ManagerCompletedController::class);
    Route::resource('manager/test/manager-english', ManagerEnglishController::class);
    Route::resource('manager/test/manager-essay', ManagerEssayController::class);
    Route::get('manager/statement/orders/uncleared',  [ManagerOrdersController::class, 'uncleared'])->name('uncleared');
    Route::get('manager/statement/orders/cleared',  [ManagerOrdersController::class, 'cleared'])->name('cleared');
    Route::get('manager/statement/orders/refunded',  [ManagerOrdersController::class, 'refunded'])->name('refunded');
    Route::resource('manager/homepage/statement', ManagerStatementController::class);
    Route::resource('manager/statement/orders', ManagerOrdersController::class);
    Route::patch('manager/work/allocate/{id}',  [ManagerProjectController::class, 'allocate'])->name('allocate');
    Route::delete('manager/work/relocate/{id}',  [ManagerProjectController::class, 'relocate'])->name('relocate');
    Route::resource('manager/homepage/writer_application', ManagerApplicationController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
