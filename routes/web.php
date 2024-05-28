<?php

use App\Http\Controllers\backend\auth\AuthController;
use App\Http\Controllers\backend\form\FormController;
use App\Http\Controllers\backend\user\UserController;
use App\Http\Controllers\frontend\settings\SettingsController;
use App\Http\Controllers\frontend\student\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/', function () {
    $locale = mb_substr(request()->header('Accept-Language'), 0, 2);

    if (! in_array($locale, config('app.available_locales'))) {
        $locale = config('app.locale');
    }

    return redirect()->route('student.index', ['locale' => $locale]);
});

Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/login-submit',[AuthController::class,'login_submit'])->name('auth.login-submit');
Route::get('/reset-password',[AuthController::class,'reset_password_page'])->name('auth.reset_password');
Route::post('/reset-password-link',[AuthController::class,'reset_password_link'])->name('auth.reset-password-link');
Route::get('/admin/reset-password/{token}/{email}',[AuthController::class,'reset_password'])->name('auth.reset_password_link');
Route::post('/reset-password-submit',[AuthController::class,'reset_password_submit'])->name('auth.reset_password_submit');

Route::middleware('auth')->group(function (){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard',[AuthController::class,'index'])->name('auth.index');
        Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');


        Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
        Route::post('/profile/profile-image-update',[UserController::class,'profile_image_update'])->name('users.profile.image.update');
        Route::post('/profile/profile-information-update',[UserController::class,'profile_information_update'])->name('users.profile.information.update');
        Route::post('/profile/profile-password-update',[UserController::class,'profile_password_update'])->name('users.profile.password.update');

        Route::middleware(['role:' . \App\Models\User::ROLE_SUPER_ADMIN])->group(function () {
            Route::get('/users/create',[UserController::class,'create'])->name('users.create');
            Route::post('/users/store',[UserController::class,'store'])->name('users.store');
            Route::get('/users/index',[UserController::class,'index'])->name('users.index');
            Route::get('/users/delete/{id}',[UserController::class,'delete'])->name('users.delete');
            Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
            Route::post('/user/image-update',[UserController::class,'image_update'])->name('users.image.update');
            Route::post('/user/information-update',[UserController::class,'information_update'])->name('users.information.update');
            Route::post('/user/password-update',[UserController::class,'password_update'])->name('users.password.update');
        });

        Route::get('/settings/index',[SettingsController::class,'index'])->name('settings.index');
        Route::post('/settings/update',[SettingsController::class,'update'])->name('settings.update');

        Route::get('/form/index',[FormController::class,'index'])->name('form.index');


        Route::get('/download-zip/{id}', [FormController::class, 'downloadZip'])->name('form.download-zip');


    });
});


Route::prefix('{locale}')->middleware(['setLocale'])->group(function () {
    Route::get('/',[StudentController::class,'index'])->name('student.index');
    Route::post('/form/store',[FormController::class,'store'])->name('form.store');
});
