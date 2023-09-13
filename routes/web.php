<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\OrdersController;


/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These
show
| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/

// Mengamankan route di bawah ini dengan middleware 'auth'
Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/checkout/{id}', [ProductController::class, 'checkout'])->name('products.checkout');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transactions/confrim/{id}', [TransactionController::class, 'confrim'])->name('transactions.confrim');
    // Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
});


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('/', [AuthController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    // Display user creation form
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    // Store a new user
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    // Display user edit form
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Update user
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/{user}/delete', [UserController::class, 'showDeleteConfirmation'])->name('users.showDeleteConfirmation');
    // Delete user
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    // Display list of users
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    // Display user details
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
});

