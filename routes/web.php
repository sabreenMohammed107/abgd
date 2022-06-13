<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CompanyContactController;
use App\Http\Controllers\Admin\CompanyContactHomeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\HowRegisterController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\WhyUsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...


Route::get('/', [IndexController::class,'index']);
Route::post('/contact-message', [IndexController::class,'sendMessage']);

Route::get('/faq', [IndexController::class,'faq']);
Route::get('/success', [IndexController::class,'success'])->name('success');
Route::get('/user-login', [UsersController::class,'login'])->name('user-login');
Route::post('/save-user', [UsersController::class,'saveLogin'])->name('save-user');
Route::get('/success-register', [UsersController::class,'successregister'])->name('success-register');
Route::get('/success-login', [UsersController::class,'successlogin'])->name('success-login');
Route::get('/success-profile', [UsersController::class,'successprofile'])->name('success-profile');
Route::get('/user-register', [UsersController::class,'register']);
Route::post('/captcha-validation', [UsersController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [UsersController::class, 'reloadCaptcha']);
Route::get('/user-profile/{id}', [UsersController::class,'profile'])->name('user-profile');
Route::post('/update-profile', [UsersController::class, 'updateProfile']);

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/user-logout', [UsersController::class,'logout'])->name('user-logout');
});


});

Auth::routes();



/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['middleware' => ['auth', 'user-access:admin'], 'prefix' => 'dashboard'], function () {
// Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('client', ClientController::class);

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
      //slider
      Route::resource('home-slider', HomeSliderController::class);
       //whyus
    Route::resource('/whyus', WhyUsController::class);

    Route::resource('admin-partners', PartnersController::class);
    //admin-company-contact
    Route::resource('/admin-company-contact', CompanyContactController::class);
    Route::resource('/admin-company-contact-home', CompanyContactHomeController::class);

//how-register
    Route::resource('/how-register', HowRegisterController::class);
//faq
    Route::resource('faq', FaqController::class);
    Route::resource('message', MessageController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');

});
