<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\IssueReportController;
use App\Model\Issue_Report;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create_project',[ProjectController::class,'create_project_page']);

Route::post('/create_pro',[ProjectController::class,'create_pro']);

Route::get('/bug_reports/{id}',[ProjectController::class,'bug_report_page']);

Route::post('/create_issue/{id}',[IssueReportController::class,'create_issue']);

Route::get('/create_issue/{id}',[IssueReportController::class,'index']);

Route::get('/delete_issue/{id}/{pid}',[IssueReportController::class,'delete_issue']);

Route::get('/edit_issue/{id}/{pid}',[IssueReportController::class,'edit_issue']);

Route::post('/update_issue/{id}/{pid}',[IssueReportController::class,'update_issue']);

Route::get('/delete_pro/{id}',[ProjectController::class,'delete_pro']);

Route::get('/edit_project/{id}',[ProjectController::class,'edit_project']);

Route::post('/update_pro/{id}',[ProjectController::class,'update_pro']);


// Route::get('issues', function () {
//     return App\Issue_Report::paginate(5) ;
// });

// ..............................User..............................

Route::get('/user_home',[ProjectController::class,'user_home']);

Route::get('/user_reports/{id}',[ProjectController::class,'user_bug_report_page']);

Route::get('/cal', function () {
    return view('cal');
});
