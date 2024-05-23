<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\UserOtpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('clear-cache', function () {
    Artisan::call('clear-compiled');
    echo "clear-compiled: complete<br>";
    Artisan::call('cache:clear');
    echo "cache:clear: complete<br>";
    Artisan::call('config:clear');
    echo "config:clear: complete<br>";
    Artisan::call('view:clear');
    echo "view:clear: complete<br>";
    Artisan::call('optimize:clear');
    echo "optimize:clear: complete<br>";
    Artisan::call('config:cache');
    echo "config:cache: complete<br>";
    Artisan::call('view:cache');
    echo "view:cache: complete<br>";
    Artisan::call('route:clear');
    echo "route:clear: complete<br>";
});

Route::get('/symlink', function () {
    Artisan::call('storage:link');
});

Route::get('/initialize', function () {
    Artisan::call('storage:link');
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed --class=RoleSeeder');
    Artisan::call('db:seed --class=AdminSeeder');
});

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/student/login', function () {
    return view('auth.student.login');
})->name('student.login');

Route::controller(UserOtpController::class)->group(function () {
    Route::post('otp/generate', 'generate')->name('otp.generate');
    Route::post('otp/verify', 'verifyOTP')->name('otp.verify');
    Route::post('otp/registerWithOTP', 'registerWithOTP')->name('otp.registerWithOTP');
    Route::post('otp/send', 'loginOTP')->name('otp.send');
    Route::post('otp/loginWithOTP', 'loginWithOtp')->name('otp.loginWithOTP');
});

Auth::routes(['verify' => true]);

// Admin user role protected routes
Route::group(['middleware' => ['auth', 'role:admin', 'verified'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard.view');
    });

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('view');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('view');
        Route::post('/update', [ProfileController::class, 'updateProfileDetails'])->name('update');
        Route::post('/updateEmail', [ProfileController::class, 'updateEmail'])->name('updateEmail');
        Route::post('/updatePassword', [ProfileController::class, 'updatePassword'])->name('updatePassword');
    });

    Route::resource('user', UserController::class);
    Route::get('user/export/{type}', [UserController::class, 'export'])->name('user.export');
    Route::post('user/updatePassword/{user_id}', [UserController::class, 'updatePassword'])->name('user.updatePassword');
    Route::post('user/updateAttendance/{user_id}', [AttendanceController::class, 'updateAttendance'])->name('user.updateAttendance');

    Route::resource('application', ApplicationController::class);
    Route::put('application/updateStatus/{application_id}', [ApplicationController::class, 'updateStatus'])->name('application.updateStatus');
    Route::get('application/export/{type}', [ApplicationController::class, 'export'])->name('application.export');

    Route::resource('notification', NotificationController::class);
    Route::get('notification/export/{type}', [NotificationController::class, 'export'])->name('notification.export');

    Route::resource('attachment', AttachmentController::class);
});

// student user role protected routes
Route::group(['middleware' => ['auth', 'role:student', 'verified'], 'prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/', function () {
        return redirect()->route('student.dashboard.view');
    });

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'studentDashboard'])->name('view');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('view');
        Route::post('/update', [ProfileController::class, 'updateProfileDetails'])->name('update');
        Route::post('/updateEmail', [ProfileController::class, 'updateEmail'])->name('updateEmail');
        Route::post('/updatePassword', [ProfileController::class, 'updatePassword'])->name('updatePassword');
    });

    Route::resource('application', ApplicationController::class);

    Route::get('notification/timeline', [NotificationController::class, 'timeline'])->name('notification.timeline');
    Route::resource('notification', NotificationController::class);

    Route::get('/programme', function () {
        return view('programme.index');
    })->name('programme.index');
});
