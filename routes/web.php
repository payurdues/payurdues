<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DueController;
use App\Http\Controllers\DuesController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\FlutterwaveTransaction;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\WaitingListController;
use Illuminate\Support\Facades\Route;








// axc3-45678-234p-om78
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

// Route::get('/ssss', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::post('/paystack/webhook', [PaymentController::class, 'handleWebhook'])->name('paystack.webhook');

Route::post('/waiting-list', [WaitingListController::class, 'store'])->name('waitlist.form');

// Show login form
Route::get('/login', [StudentController::class, 'showLoginForm'])->name('login.form');

// Handle login submission
Route::post('/login', [StudentController::class, 'login'])->name('login');

Route::post('/flw-webhook', [FlutterwaveTransaction::class, 'handleFlutterwaveWebhook']);

Route::post('/payment/callback', [FlutterwaveTransaction::class, 'paymentCallback'])->name('payment.callback');

Route::get('/manual', [StudentController::class, 'manualform'])->name('manual.form');

Route::post('/manualpayment/calls', [FlutterwaveTransaction::class, 'MANpaymentCallback'])->name('manual.callback');

Route::middleware(['auth:student'])->group(function () {
    Route::get('/Pay-due', [StudentController::class, 'selectDue'])->name('select.due');

    Route::get('/History', [StudentController::class, 'history'])->name('select.history');

    Route::post('/flutterwave/bank-transfer', [StudentController::class, 'initiateBankTransfer']);

    Route::get('/test-due', [StudentController::class, 'noldselectDue'])->name('test.due');
    Route::get('/select-due', [StudentController::class, 'oldselectDue'])->name('selecssst.due');
    Route::get('/PaymentFassa', [StudentController::class, 'paymentpage'])->name('payment.show');

    Route::get('/PaymentPROSPECTUS', [StudentController::class, 'paymentpagePROSPECTUS'])->name('PROSPECTUSpayment.show');

    Route::post('/payment/callback', [FlutterwaveTransaction::class, 'paymentCallback'])->name('payment.callback');

    // routes/web.php
    Route::get('/receipt/{trans_id}', [PaymentController::class, 'showReceipt'])->name('receipt.show');



    Route::get('callback', [PaymentController::class, 'callback'])->name('callback');
    Route::get('success', [PaymentController::class, 'success'])->name('success');
    Route::get('cancel', [PaymentController::class, 'cancel'])->name('cancel');
});





Route::get('/association/login', [AssociationController::class, 'showLoginForm'])->name('association.login.form');

// Handle login submission
Route::post('/association/login', [AssociationController::class, 'login'])->name('association.login');

Route::middleware(['auth:association'])->group(function () {

    Route::resource('dues', DuesController::class)->only(['index', 'show']);
    Route::resource('dashboard', DashboardController::class)->only(['index', 'show']);
    Route::get('transactions/search', [TransactionsController::class, 'search'])->name('transactions.search');

    Route::post('dues/add', [DueController::class, 'store'])->name('due.store');

    Route::get('transactions/type', [TransactionsController::class, 'type'])->name('transactions.type');

    Route::resource('transactions', TransactionsController::class)->only(['index', 'show']);

    Route::post('/transactions/export', [TransactionsController::class, 'export'])->name('transactions.export');


    Route::resource('members', MembersController::class)->name('members', 'show_member')->only(['index', 'show']);
    Route::post('students/store', [MembersController::class, 'store'])->name('students.store');


    Route::post('/students/import', [MembersController::class, 'import'])->name('students.import');

 
      // Route for listing elections (index)
    Route::get('voting', [ElectionController::class, 'index'])->name('election_index');

    // Route for showing a specific election
    Route::get('/Create/election', [ElectionController::class, 'create'])->name('create_election');
    //  Route::get('/Create/category', [ElectionController::class, 'create_category'])->name('create_category');

    Route::post('/Election/store', [ElectionController::class, 'store'])->name('elections.store');

    // Route::get('/Elections/{election}', [ElectionController::class, 'show'])->name('elections.show');

    Route::get('/elections/{election}', [ElectionController::class, 'show'])->name('elections.show');

    Route::resource('categories', CategoryController::class);

    Route::post('/candidates/store', [CandidateController::class, 'store'])->name('candidates.store');



});

Route::get('/offline', function () {
    return view('offline');
});



Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
        Route::post('association/register', [AdminController::class, 'store'])->name('admin.assoc_store');
        Route::get('association/{id}', [AdminController::class, 'show'])->name('admin.association.show');
        

    });
});
