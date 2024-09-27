<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Registration;
use Doctrine\DBAL\Schema\Index;
use Filament\Pages\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthRegisterController;
use App\Http\Controllers\RegistrationController;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/', function () {
    return view('home');
});
Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::resource('/registration',RegistrationController::class)->middleware('auth');

Route::get('/register',[AuthRegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[AuthRegisterController::class, 'store']);

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);