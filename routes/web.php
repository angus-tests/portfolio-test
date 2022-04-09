<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SkillSectionController;
use App\Http\Controllers\CategoryController;

use Illuminate\Http\Request;


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


Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Resource Controllers 
Route::resource('projects', ProjectController::class);
Route::resource('skills', SkillController::class);
Route::resource('section', SkillSectionController::class);
Route::resource('categories', CategoryController::class);


//Contact
Route::get('/contact', function () {
    return (new ContactController())->show();
});
Route::post('/contact', function (Request $request) {
    return (new ContactController())->send($request);
});

//AJAX
Route::get('/tagSearch', 'App\Http\Controllers\HelperController@tagSearch');



require __DIR__.'/auth.php';
