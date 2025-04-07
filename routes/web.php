<?php
use App\Http\Middleware\admin;
use App\Http\Middleware\student ;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\staffs;
use App\View\Components\staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('Admindashboard');
        }
        else if  (Auth::user()->is_admin == 2){
            return redirect()->route('staffdashboard');
        }
        else {
            return redirect()->route('user-dashboard');
        }
    })->name('dashboard');
});


Route::prefix('admin')->middleware(['auth', admin::class])->group(function () {
    Route::get('/Admindashboard', function () {
        return view('admin.indexx');
    })->name('Admindashboard');

    Route::get('/approved-appointemnts', function () {
        return view('admin.approved-appointments');
    })->name('admin.approved-appointemnts');

    Route::get('/add_staff', function () {
        return view('admin.add_staff');
    })->name('admin.add_staff');


    Route::get('/uploads', function () {
        return view('admin.upload');
    })->name('uploadss');



    // Route::post('/logout', function () {
    //     Auth::logout();
    //     return redirect('/login');
    // })->name('logouts');

});


Route::prefix('student')->middleware(['auth', student::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('student.index');
    })->name('user-dashboard');

    Route::get('/appointment', function () {
        return view('student.appointment');
    })->name('student.appointment');


    Route::get('/appointment-status', function () {
        return view('student.appointment-status');
    })->name('student.appointment-status');


    // Route::post('/logout', function () {
    //     Auth::logout();
    //     return redirect('/login');
    // })->name('logout');

});

Route::prefix('staffs')->middleware(['auth', staffs::class])->group(function () {
    Route::get('/staffdashboard', function () {
        return view('staff.index');
    })->name('staffdashboard');

    Route::get('/staff.appointments', function () {
        return view('staff.appointments');
    })->name('staff.appointments');

    Route::get('/staff.approved_appointments', function () {
        return view('staff.approved_appointment');
    })->name('staff.approved_appointments');


    // Route::post('/logout', function () {
    //     Auth::logout();
    //     return redirect('/login');
    // })->name('logout');

});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
