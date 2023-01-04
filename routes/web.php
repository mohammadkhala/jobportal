<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WorkController;

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
use Illuminate\Support\Facades\Route;

Auth::routes();

// Page Controller

Route::get('/', [PageController::class, 'index']);


// Job Controller

Route::resource('/jobs', [JobController::class]);


// Freelancer Controller

Route::get('/userdashboard', [FreelancerController::class, 'index']);

Route::post('/profile/store', [FreelancerController::class, 'storeProfile']);

Route::post('/profile/edit', [FreelancerController::class, 'updateProfile']);

Route::post('/profile/uploadphoto', [FreelancerController::class, 'uploadPhoto']);

Route::post('/profile/updatephoto', [FreelancerController::class, 'updatePhoto']);

Route::get('/profile/{name}', [FreelancerController::class, 'profile']);

Route::get('/my-jobs', [FreelancerController::class, 'myJobs']);


// Skill Controller

Route::post('/profile/skills/store', [SkillController::class, 'storeSkill']);

Route::post('/profile/skills/edit', [SkillController::class, 'editSkill']);

// Education Controller

Route::post('/profile/education/store', [EducationController::class, 'storeEducation']);

Route::post('/profile/education/update', [EducationController::class, 'updateEducation']);

Route::post('/profile/education/delete', [EducationController::class, 'deleteEducation']);

// Client Controller

Route::get('/dashboard', [ClientController::class, 'dashboard']);

Route::get('/shortlist/{id}', [ClientController::class, 'shortlist']);

Route::get('/proposal/{id}/{user_id}', [ClientController::class, 'proposal']);

Route::get('/proposal/{id}/{user}/hire', [ClientController::class, 'hire']);

Route::get('/proposal/{id}/{user}/reject', [ClientController::class, 'reject']);

// Work Controller

Route::post('/profile/work/store', [WorkController::class, 'storeWork']);

Route::post('/profile/work/update', [WorkController::class, 'updateWork']);

Route::post('/profile/work/delete', [WorkController::class, 'deleteWork']);

// Applicant Controller

Route::get('/job/application/{id}', [ApplicantController::class, 'show']);

Route::post('/job/application/{id}/store', [ApplicantController::class, 'store']);

Route::get('/applicant/profile/{id}', [ApplicantController::class, 'view']);

// Admin Controller

Route::get('/panel/freelancer', [AdminController::class, 'showFreelancers']);

Route::post('/panel/users/ban', [AdminController::class, 'banFreelancer']);

Route::post('/panel/freelancer/unban', [AdminController::class, 'unbanFreelancer']);

Route::get('/panel/clients', [AdminController::class, 'showClients']);

Route::post('/panel/client/unban', [AdminController::class, 'unbanClient']);

Route::get('/panel/jobs', [AdminController::class, 'showJobs']);

Route::get('/panel/jobs/delete/{id}', [AdminController::class, 'deleteJob']);

Route::get('/panel/categories', [AdminController::class, 'showCategories']);

Route::post('/panel/categories/add', [AdminController::class, 'addCategories']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
