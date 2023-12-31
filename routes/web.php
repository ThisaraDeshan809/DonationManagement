<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonatorController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::controller(AuthController::class)->group(function () {
    Route::post('/login','login')->name('login');
    Route::get('/logout','logout')->name('logout');
    Route::get('login','loginView')->name('login.View');
    Route::post('register','register')->name('Register');
    Route::get('register','registerView')->name('Register.View');
    Route::get('dashboard','home')->name('Dashboard')->middleware('auth:api');
});

Route::controller(DonationController::class)->group(function() {
    Route::get('donations','index')->name('Donation.Index');
    Route::get('NewDonation','newDonation')->name('Donation.New');
    Route::post('store','store')->name('Donation.store');
    Route::get('update/{id}','updateView')->name('Donation.update.view');
    Route::post('update/{id}','update')->name('Donation.update');
    Route::get('delete/{id}','delete')->name('Donation.delete');
});

Route::controller(DonatorController::class)->group(function() {
    Route::get('index','index')->name('Donator.index');
    Route::get('DonatorDelete/{id}','delete')->name('Donator.delete');
});

Route::controller(IssueController::class)->group(function () {
    Route::get('NewIssue','newIssueView')->name('Issue.New');
    Route::get('IssueIndex','index')->name('Issue.Index');
    Route::post('IssueStore','store')->name('Issue.Store');
    Route::get('IssueUpdate/{id}','updateView')->name('Issue.Update.View');
    Route::post('IssueUpdate/{id}','update')->name('Issue.Update');
    Route::get('IsuueDelete/{id}','delete')->name('Issue.Delete');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('NewProduct','newProductView')->name('Product.New');
    Route::get('ProductIndex','index')->name('Product.Index');
    Route::post('ProductStore','store')->name('Product.Store');
    Route::get('ProductUpdate/{id}','updateView')->name('Product.Update.View');
    Route::post('ProductUpdate/{id}','update')->name('Product.Update');
    Route::get('ProductDelete/{id}','delete')->name('Product.Delete');
});

Route::controller(InventoryController::class)->group(function() {
    Route::get('InventoryIndex','index')->name('Inventory.Index');
});
