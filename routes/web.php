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

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/


Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show']);
// Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');




Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


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

