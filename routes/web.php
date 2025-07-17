<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;
use App\Http\Controllers\IndexController;



Route::post('/generate-cv', [CVController::class, 'generate'])->name('generate-cv');

// Main Site Routes
Route::get('/', [IndexController::class, 'main']);
Route::get('/main', [IndexController::class, 'main'])->name('main');
Route::get('/cv', [CVController::class, 'cv'])->name('cv');
Route::get('/jobs', [IndexController::class, 'jobs'])->name('jobs');
Route::get('/candidate', [IndexController::class, 'candidate'])->name('candidate');
Route::get('/trainings', [IndexController::class, 'trainings'])->name('trainings');
Route::get('/elements', [IndexController::class, 'elements'])->name('elements');
Route::get('/blogpost', [IndexController::class, 'blogpost'])->name('blogpost');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::match(['GET', 'POST'], '/job_details/{id}', [IndexController::class, 'job_details'])->name('job_details');
Route::get('/category/{id}', [IndexController::class, 'category'])->name('category');
Route::match(['GET', 'POST'], '/login', [IndexController::class, 'login'])->name('login');
Route::match(['GET', 'POST'], '/logup', [IndexController::class, 'logup'])->name('logup');
Route::match(['GET', 'POST'], '/checkeradmin', [App\Http\Controllers\admin\AdminController::class, 'checkeradmin'])->name('checkeradmin');
Route::match(['GET', 'POST'], '/single-blog/{id}', [IndexController::class, 'singleblog'])->name('single-blog');
Route::match(['GET', 'POST'], '/candidate-detail/{id}', [IndexController::class, 'candidatedetail'])->name('candidate-detail');
Route::match(['GET', 'POST'], '/apply/{id}', [IndexController::class, 'apply'])->name('apply');
Route::match(['GET', 'POST'], '/company-login', [IndexController::class, 'login2'])->name('login2');
Route::match(['GET', 'POST'], '/cab', [IndexController::class, 'cab'])->name('cab');
Route::match(['GET', 'POST'], '/postjob', [IndexController::class, 'postjob'])->name('postjob');
Route::match(['GET', 'POST'], '/company-profile', [IndexController::class, 'companyprofile'])->name('company-profile');
Route::match(['GET', 'POST'], '/editcomp', [IndexController::class, 'editcomp'])->name('editcomp');
Route::match(['GET', 'POST'], '/edit', [IndexController::class, 'edit'])->name('edit');
Route::match(['GET', 'POST'], '/about', [IndexController::class, 'about'])->name('about');
Route::match(['GET', 'POST'], '/exit', [IndexController::class, 'exit'])->name('exit');
Route::match(['GET', 'POST'], '/successfully', [IndexController::class, 'successfully'])->name('successfully');
Route::match(['GET', 'POST'], '/addjob', [IndexController::class, 'addjob'])->name('addjob');
Route::match(['GET', 'POST'], '/myapplications', [IndexController::class, 'myapplications'])->name('myapplications');
Route::match(['GET', 'POST'], '/myapplications2', [IndexController::class, 'myapplications2'])->name('myapplications2');
Route::match(['GET', 'POST'], '/view_candidates/{id}', [IndexController::class, 'viewCandidates'])->name('view_candidates');
Route::match(['GET', 'POST'], '/decline-candidate/{id}', [IndexController::class, 'declinecandidate'])->name('decline-candidate');
Route::match(['GET', 'POST'], '/approve-candidate/{id}', [IndexController::class, 'approvecandidate'])->name('approve-candidate');
Route::match(['GET', 'POST'], '/news-category/{id}', [IndexController::class, 'newscategory'])->name('newscategory');
Route::match(['GET', 'POST'], '/contact/submit', [IndexController::class, 'submitContact'])->name('contact.submit');
Route::match(['GET', 'POST'], '/filter', [IndexController::class, 'filter'])->name('filter');
Route::match(['GET', 'POST'], '/jobedit2/{id}', [IndexController::class, 'jobedit2'])->name('jobedit2');
Route::match(['GET', 'POST'], '/jobdelete2/{id}', [IndexController::class, 'jobdelete2'])->name('jobdelete2');

// Admin Routes
Route::prefix('admin')->group(function() {

    $admin = App\Http\Controllers\admin\AdminController::class;

    Route::get("/", [$admin, 'admin'])->name('home');
    Route::match(['GET','POST'], '/site', [$admin, 'site'])->name('site');
    Route::match(['GET','POST'], '/delete', [$admin, 'delete'])->name('delete');
    Route::match(['GET','POST'], '/dellcat/{id}', [$admin, 'dellcat'])->name('dellcat');
    Route::match(['GET','POST'], '/dellnews/{id}', [$admin, 'dellnews'])->name('dellnews');
    Route::match(['GET','POST'], '/dellcomp/{id}', [$admin, 'dellcomp'])->name('dellcomp');
    Route::match(['GET','POST'], '/dellnewscat/{id}', [$admin, 'dellnewscat'])->name('dellnewscat');
    Route::match(['GET','POST'], '/canddelete/{id}', [$admin, 'canddelete'])->name('canddelete');
    Route::match(['GET','POST'], '/applicationdelete/{id}', [$admin, 'applicationdelete'])->name('applicationdelete');
    Route::match(['GET', 'POST'], '/addjobs', [$admin, 'addjobs'])->name('addjobs');
    Route::match(['GET', 'POST'], '/addjobs2', [$admin, 'addjobs2'])->name('addjobs2');
    Route::match(['GET', 'POST'], '/jobhandle', [$admin, 'jobhandle'])->name('jobhandle');
    Route::match(['GET','POST'], '/editcat/{id}', [$admin, 'editcat'])->name('editcat');
    Route::match(['GET','POST'], '/editnewscat/{id}', [$admin, 'editnewscat'])->name('editnewscat');
    Route::match(['GET','POST'], '/editnews/{id}', [$admin, 'editnews'])->name('editnews');
    Route::match(['GET','POST'], '/jobedit/{id}', [$admin, 'jobedit'])->name('jobedit');
    Route::match(['GET','POST'], '/jobdelete/{id}', [$admin, 'jobdelete'])->name('jobdelete');
    Route::match(['GET','POST'], '/permitcom/{id}', [$admin, 'permitcom'])->name('permitcom');
    Route::match(['GET','POST'], '/dpermitcom/{id}', [$admin, 'dpermitcom'])->name('dpermitcom');
    Route::match(['GET','POST'], '/compedit/{id}', [$admin, 'compedit'])->name('compedit');
    Route::match(['GET','POST'], '/candedit/{id}', [$admin, 'candedit'])->name('candedit');
    Route::match(['GET','POST'], '/edittrainings/{id}', [$admin, 'edittrainings'])->name('edittrainings');
    Route::match(['GET','POST'], '/edituser/{id}', [$admin, 'edituser'])->name('edituser');
    Route::match(['GET','POST'], '/delluser/{id}', [$admin, 'delluser'])->name('delluser');
    Route::match(['GET','POST'], '/ordersuser/{id}', [$admin, 'ordersuser'])->name('ordersuser');
    Route::match(['GET','POST'], '/admincompany', [$admin, 'admincompany'])->name('admincompany');
    Route::match(['GET','POST'], '/adminnews', [$admin, 'adminnews'])->name('adminnews');
    Route::match(['GET','POST'], '/newscat', [$admin, 'newscat'])->name('newscat');
    Route::match(['GET','POST'], '/adminjobs', [$admin, 'adminjobs'])->name('adminjobs');
    Route::match(['GET','POST'], '/admincandidates', [$admin, 'admincandidates'])->name('admincandidates');
    Route::match(['GET','POST'], '/adminapplications', [$admin, 'adminapplications'])->name('adminapplications');
    Route::match(['GET','POST'], '/delltov/{id}', [$admin, 'delltov'])->name('delltov');
    Route::match(['GET','POST'], '/delltrainings/{id}', [$admin, 'delltrainings'])->name('delltrainings');
    Route::match(['GET','POST'], '/cancelord/{id}', [$admin, 'cancelord'])->name('cancelord');
    Route::match(['GET','POST'], '/finishord/{id}', [$admin, 'finishord'])->name('finishord');
    Route::match(['GET','POST'], '/addcat', [$admin, 'addcat'])->name('addcat');
    Route::match(['GET','POST'], '/addnewscat', [$admin, 'addnewscat'])->name('addnewscat');
    Route::match(['GET','POST'], '/addnews', [$admin, 'addnews'])->name('addnews');
    Route::match(['GET','POST'], '/addtrainings', [$admin, 'addtrainings'])->name('addtrainings');
    Route::match(['GET','POST'], '/admincategory', [$admin, 'admincategory'])->name('admincategory');
    Route::match(['GET','POST'], '/addtov', [$admin, 'addtov'])->name('addtov');
    Route::match(['GET','POST'], '/addcand', [$admin, 'addcand'])->name('addcand');
    Route::match(['GET','POST'], '/checkeradmin', [$admin, 'checkeradmin'])->name('checker');
    Route::match(['GET','POST'], '/admintrainings', [$admin, 'admintrainings'])->name('admintrainings');
    Route::match(['GET', 'POST'], '/decline-job/{id}', [$admin, 'declinejob'])->name('decline-job');
    Route::match(['GET', 'POST'], '/approve-job/{id}', [$admin, 'approvejob'])->name('approve-job');
    Route::match(['GET','POST'], '/users/', [$admin, 'users'])->name('users');
});
