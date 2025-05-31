<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserComplain;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ResolverController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('login');
});

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/edit-profile', [AuthController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/Update', [AuthController::class, 'update'])->name('update')->middleware('auth');


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('add-complaints', [ComplaintController::class, 'index'])->name('add-complain');
    Route::post('/complaints/store', [ComplaintController::class, 'store'])->name('complaints.store');
    Route::get('/my-complaints', [ComplaintController::class, 'show'])->name('user.show_complain');
    Route::delete('/complaints/{id}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');
    Route::get('complaints/{id}/edit', [ComplaintController::class, 'edit'])->name('complaints.edit');
    Route::put('complaints/{id}', [ComplaintController::class, 'update'])->name('complaints.update');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/all-complaints', [AdminController::class, 'show'])->name('admin.show_complain');
    Route::get('/complaint-handlers', [AdminController::class, 'resolvers'])->name('resolvers.index');
    Route::get('/complaint-handlers/create', [AdminController::class, 'create'])->name('resolvers.create');
    Route::post('/complaint-handlers/store', [AdminController::class, 'store'])->name('resolvers.store');
    Route::delete('/resolvers/{id}', [AdminController::class, 'destroy'])->name('resolvers.destroy');
    Route::get('/resolvers/{id}/edit', [AdminController::class, 'edit_resolver'])->name('resolvers.edit');
    Route::put('/resolvers/{id}', [AdminController::class, 'update_resolver'])->name('resolvers.update');
    Route::post('complaints/assign', [ComplaintController::class, 'assignResolver'])->name('complaints.assign');
});

Route::middleware(['auth', 'role:resolver'])->group(function () {
    Route::get('/resolver/dashboard', [ResolverController::class, 'index'])->name('resolver.dashboard')->middleware(['auth']);
    Route::post('/resolver/update-status/{complaint}', [ResolverController::class, 'updateStatus'])->name('resolver.updateStatus');
});


