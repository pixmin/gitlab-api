<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitlabController;

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
    return view('welcome');
});

Route::get('/events', [GitlabController::class, 'all']);
Route::get('/events/{user_id}', [GitlabController::class, 'perUser']);
