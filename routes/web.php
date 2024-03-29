<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

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
    return view('photo');
});
Route::post('/photo', function (Request $request) {
    // dd($request);
    Storage::disk('local')->put('example.txt', 'Contents');
})->name('photo');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', function () {
    $users=User::all();
    return view('users.index', compact('users'));
    
})->name('users.index');

Route::get('/search', function (Request $request) {
    //dd($request->name);
    $users=User::where("name", "=", $request->name)->get();
    return view('users.index', compact('users'));
    
})->name('users.search');

require __DIR__.'/auth.php';
