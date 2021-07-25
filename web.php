<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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

Route::post('users',[userController::class,'getData']);
Route::view('login','users');
Route::get('contactdata',[userController::class,'fetchData']); // for fetch data from database
Route::view('index','index');
Route::view('aboutx','about');
Route::get('about',[userController::class,'fetchMember']);
Route::view('services','services');
Route::view('pricing','pricing');
Route::view('portfolio','portfolio');
Route::view('blogx','blog');
Route::get('blog',[userController::class,'fetchBlog']);
Route::view('gallery','gallery');
Route::view('portfolio-details','portfolio-details');
Route::view('blog-details','blog-details');
Route::view('contact','contact');
Route::post('insert',[userController::class,'insert']);	//for insert data from contact
Route::view('appointment', 'appointment');
Route::post('insert_appointment', [userController::class, 'insert_appointment']); // insert data

//Route::view('Admin','admin_dashboard'); 
//Route::get('Admin', [userController::class,'loginAdmin']); 
Route::group(['middleware'=>['loginAdmin']], function(){
    Route::view('Admin','admin_dashboard');
    Route::post('inserAdmin',[userController::class,'inserAdmin']);
    Route::view('Admin-profile','admin_profile');
    Route::view('admin-tablesx','admin_tables');
    Route::get('Admin-tables',[userController::class,'fetchMemberInAdmin']);
    Route::view('team-members','team-members');
    Route::post('insertMember', [userController::class,'insertMember']);
    Route::view('add-blog','add-blog');
    Route::post('insertBlog',[userController::class,'insertBlog']);
    Route::view('send-mail','send-mail');
    Route::post('sendMail',[userController::class,'sendMail']);
    Route::view('dynamic_email','dynamic_email');
    Route::get('edit/{member_id}',[userController::class,'editMember']);

}); 
Route::view('Admin-login','admin_login');
Route::post('loginAdmin',[userController::class,'loginAdmin']);
Route::view('Admin-create','admin_create');
Route::get('logout', function () {
    session()->forget('data');
    return redirect('Admin-login');
});