<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => 'auth'], function() {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    Route::group(['middleware' => 'checkRole:1'], function() {
        Route::get('/adminDashboard', [AdminController::class, 'adminDashboard'])->name('adminDashboard');
        Route::get('/adminRoom', [AdminController::class, 'adminRoom'])->name('adminRoom');
        Route::get('/addRoom', [AdminController::class, 'addRoom'])->name('addRoom');
        Route::post('/saveRoom', [AdminController::class, 'saveRoom'])->name('saveRoom');
        Route::get('/rooms/{room}/edit', [AdminController::class, 'editRoom'])->name('editRoom');
        Route::post('/rooms/{room}', [AdminController::class, 'updateRoom'])->name('updateRoom');
        Route::get('/deleteRoom/{id}', [AdminController::class, 'deleteRoom'])->name('deleteRoom');
        
        Route::get('/editAProfile', [AdminController::class, 'editAProfile'])->name('editAProfile');

        Route::get('/manageBook',[AdminController::class, 'manageBook'])->name('manageBook');
        Route::get('/books/{book}/update',[AdminController::class, 'editBook'])->name('editBook');
        Route::post('/books/{book}',[AdminController::class, 'updateBook'])->name('updateBook');
    });
    Route::group(['middleware' => 'checkRole:2'], function() {
        Route::get('/userDashboard',[UserController::class, 'userDashboard'])->name('userDashboard');
        Route::get('/rooms/{room}/bookRoom', [UserController::class, 'bookRoom'])->name('bookRoom');
        Route::post('/saveBook', [UserController::class, 'saveBook'])->name('saveBook');
        Route::get('/myBook',[UserController::class, 'myBook'])->name('myBook');
        Route::get('/cancelBook/{id}', [UserController::class, 'cancelBook'])->name('cancelBook');



    });
    Route::group(['middleware' => 'checkRole:3'], function() {
        Route::inertia('/guestDashboard', 'GuestDashboard')->name('guestDashboard');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
