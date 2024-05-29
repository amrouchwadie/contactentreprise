<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\ContactController::class, 'index'])->name('welcome');
Route::get('/contact-info/{id}', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.info');
Route::delete('/contact/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contact.destroy');
Route::get('/contacts/search', [App\Http\Controllers\ContactController::class, 'rechercher'])->name('contacts.search');
Route::get('/contacts/add', [App\Http\Controllers\ContactController::class, 'create'])->name('add_contact_modal');
Route::post('/contacts/add',[App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');