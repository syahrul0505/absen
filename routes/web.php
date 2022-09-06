<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DepartementController;
use App\Http\Controllers\backend\HistoryLogController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\FilterController;
use App\Http\Controllers\backend\AbsenController;
use App\Http\Controllers\backend\ReportController;
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

// =================================================================================================================================
// ======================================================BACKEND ROUTE==============================================================
// =================================================================================================================================
    Route::get('/', function () {
        $data['page_title'] = "Login";
        return view('backend.auth.login', $data);
    })->name('user.login');

    // Route::get('/', function () {
    //     return view('frontend.welcome');
    // })->name('home');

    Route::middleware('auth:web')->group(function () {

        Route::prefix('admin/')->name('backend.')->group(function ()  {
 
            // Dashboard
            // Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');

            // Master Data Prefix
            Route::prefix('master-data')->group(function () {

                // Master Data
                Route::get('/', function () {
                    $data['page_title'] = 'Master Data';
                    $data['breadcumb'] = 'Master Data';
                    return view('backend.master-data.index', $data);
                })->name('master-data.index');

                // Departement
                Route::resource('departements', DepartementController::class);

                // Users
                Route::patch('change-password', [UserController::class, 'changePassword'])->name('users.change-password');
                Route::resource('users', UserController::class)->except([
                    'show'
                ]);;
            });
            
            // absen
            Route::resource('absen', AbsenController::class);

            // Report
            Route::get('report', [ReportController::class, 'index'])->name('report.index');
            Route::post('/report-absen-export', [ReportController::class, 'ReportExport'])->name('report-absen-export');

            // Filter
            Route::resource('filter', FilterController::class);

            // History Log
            Route::resource('history-log', HistoryLogController::class)->except([
                'show', 'create', 'store', 'edit', 'update'
            ]);;
        });
    });
// =================================================================================================================================
// ==================================================END BACKEND ROUTE==============================================================
// =================================================================================================================================

// ---------------------------------------------------------------------------------------------------------------------------------

// =================================================================================================================================
// =====================================================FRONTEND ROUTE==============================================================
// =================================================================================================================================






// =================================================================================================================================
// =====================================================END FRONTEND ROUTE==========================================================
// =================================================================================================================================

