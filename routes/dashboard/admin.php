<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Auth\LogoutController;
use App\Http\Controllers\Dashboard\TrainerController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\ProgramController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ReportController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\SupervisorController;
use App\Http\Controllers\Dashboard\SettingController;



use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\Auth\Password\AdminForgotPasswordController;
use App\Http\Controllers\Dashboard\Auth\Password\AdminResetPasswordController;

Route::prefix('dashboard')->name("dashboard.")->group(function () {
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::resource('home', HomeController::class);
        Route::resource('trainers', TrainerController::class);
        Route::resource('students', StudentController::class);
        Route::resource('countries', CountryController::class);
        Route::resource('programs', ProgramController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('supervisors', SupervisorController::class);


        Route::get('/profile',[ ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile/edit',[ ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update',[ ProfileController::class, 'update'])->name('profile.update');

        Route::get('report/trainers', [ReportController::class, 'trainers'])->name('report.trainers');
        Route::get('report/students', [ReportController::class, 'students'])->name('report.students');
        Route::get('report/countries', [ReportController::class, 'countries'])->name('report.countries');
        Route::get('report/programs', [ReportController::class, 'programs'])->name('report.programs');

        Route::get('/settings/notifications', [SettingController::class, 'notifications']);
        Route::post('send-notification', [SettingController::class, 'send']);

    });

    Route::resource('login', LoginController::class);
    Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
});

    Route::post('/password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('/password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/password/reset', [AdminForgotPasswordController::class, 'reset']);
    Route::get('/password/reset/{token}', [AdminForgotPasswordController::class, 'showResetForm'])->name('admin.password.reset');

// });
