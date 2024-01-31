<?php

use Illuminate\Support\Facades\Route;

// routes/web.php ou routes/api.php

use App\Http\Controllers\PaymentController;

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




Route::get('/pay-amortizations/{date}', [PaymentController::class, 'payAmortizationsBeforeDate']);
