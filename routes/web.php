<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TempatController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Tempat;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\UserController;




Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/admin', function () {
    return view('layouts.welcome');
});


Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        if (auth()->user()->role == 'admin') {
            return redirect('/admin/tempat');
        }
        return redirect('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
});

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);

     $user = User::create([  // ← Sekarang User dikenali
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user',
    ]);

    Auth::login($user);
    return redirect('/dashboard');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/tempat', [TempatController::class, 'index'])->name('admin.tempat.index');
    Route::get('/admin/tempat/create', [TempatController::class, 'create'])->name('admin.tempat.create');
    Route::post('/admin/tempat', [TempatController::class, 'store'])->name('admin.tempat.store');
    Route::get('/admin/tempat/{id}/edit', [TempatController::class, 'edit'])->name('admin.tempat.edit');
    Route::put('/admin/tempat/{id}', [TempatController::class, 'update'])->name('admin.tempat.update');
    Route::delete('/admin/tempat/{id}', [TempatController::class, 'destroy'])->name('admin.tempat.delete');
});

// ADMIN LIHAT PEMINJAMAN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/peminjaman', [PeminjamanController::class, 'adminIndex'])->name('admin.peminjaman.index');
    Route::get('/admin/peminjaman/{peminjaman}', [PeminjamanController::class, 'show'])->name('admin.peminjaman.show');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        $tempats = \App\Models\Tempat::where('status', 'tersedia')->get();
        return view('dashboard', compact('tempats'));
    })->name('dashboard');
});

// USER FORM PEMINJAMAN
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
});

// USER kirim pesan dari dashboard form
Route::middleware(['auth', 'role:user'])->post('/pesan', [PesanController::class, 'store'])->name('pesan.store');

// ADMIN pesan (match peminjaman style)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/pesan', [PesanController::class, 'adminIndex'])->name('admin.pesan.index');
    Route::delete('/admin/pesan/{pesan}', [PesanController::class, 'destroy'])->name('admin.pesan.destroy');
});
Route::delete('/admin/pesan/{pesan}', [PesanController::class, 'destroy'])->name('admin.pesan.destroy');



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

