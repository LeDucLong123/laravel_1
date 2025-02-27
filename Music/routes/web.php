<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


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
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');


//auth
Route::name('auth.')->controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
    Route::post('signup', 'signup')->name('signup');
    Route::post('register', 'register')->name('register');
});



//user
Route::prefix('user')->middleware(['auth', 'role'])->name('user.')->controller(UserController::class)->group(function () {
    Route::get('index', 'index')->name('index')->withoutMiddleware(['auth', 'role']);
    Route::get('create', 'create')->name('create');
    Route::post('add', 'add')->name('add');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('updata/{id}', 'updata')->name('updata');
    Route::get('delete/{id}', 'delete')->name('delete');
});

//room
Route::prefix('room')->middleware(['auth', 'role'])->name('room.')->controller(RoomsController::class)->group(function () {
    Route::get('index', 'index')->name('index')->withoutMiddleware(['auth', 'role']);
    Route::get('create', 'create')->name('create');
    Route::post('add', 'add')->name('add');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('updata/{id}', 'updata')->name('updata');
    Route::get('delete/{id}', 'delete')->name('delete');
    Route::get('order/{id}', 'order')->name('order')->withoutMiddleware('role');
});

//order
Route::prefix('order')->middleware('auth')->name('order.')->controller(OrderController::class)->group(function () {
    Route::get('index', 'index')->name('index')->withoutMiddleware('auth');
    Route::get('detail/{id}', 'detail')->name('detail');
    Route::get('checkout/{idRoom}/{idOrder}', 'checkout')->name('checkout');
});
