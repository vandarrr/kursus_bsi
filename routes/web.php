<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function(){
    Route::get('auth',[AuthController::class,'auth'])->name('auth');
    Route::post('register',[AuthController::class,'register'])->name('register');
    Route::post('login',[AuthController::class,'login'])->name('login');
});

Route::get('admin',[AdminController::class,'index'])->name('admin')->middleware('role:admin');
Route::get('user',[UserController::class,'index'])->name('user')->middleware('role:user');

Route::middleware(['auth'])->group(function(){

    // User Fitur
    Route::get('cybersecurity',[UserController::class,'cybersecurity'])->name('cybersecurity');
    Route::get('uiux',[UserController::class,'uiux'])->name('uiux');

    Route::post('create',[UserController::class,'create'])->name('create');

    Route::get('jadwal',[UserController::class,'jadwal'])->name('jadwal');
    Route::get('laporan',[UserController::class,'laporan'])->name('laporan');

    Route::post('generate-laporan',[UserController::class,'generateLaporanPdf'])->name('generateLaporanPdf');

    // Admin Fitur
    Route::get('control-cybersecurity', [AdminController::class, 'controlcybersecurity'])->name('cybersecurityadmin');
    Route::get('control-uiux', [AdminController::class, 'controluiux'])->name('uiuxadmin');
    Route::get('laporan-admin', [AdminController::class, 'laporanAdmin'])->name('laporanadmin')->middleware
    ('auth');
    Route::get('control-user', [AdminController::class, 'controlUser'])->name('users');
    Route::get('jadwal-cybersecurity', [AdminController::class, 'jadwalcybersecurity'])->name('jadwalcybersecurity');
    Route::get('jadwal-uiux', [AdminController::class, 'jadwaluiux'])->name('jadwaluiux');
    Route::post('admin/update-berita', [AdminController::class, 'updateBerita'])->name('admin.updateBerita')
    ->middleware('auth');
    Route::post('admin/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');
    Route::post('admin/reject/{id}', [AdminController::class, 'reject'])->name('admin.reject');
    Route::post('admin/jadwal', [AdminController::class, 'storeJadwal'])->name('storeJadwal');
    Route::post('admin/jadwal/{id}', [AdminController::class, 'updatejadwal'])->name('updatejadwal');
    Route::delete('admin/jadwal/{id}', [AdminController::class, 'destroyJadwal'])->name('destroyJadwal');
    Route::get('admin/jadwal/{id}/edit', [AdminController::class, 'edit']);
    Route::post('generate-laporan-admin', [AdminController::class, 'generateLaporanAdminPdf'])->name
    ('generateLaporanAdminPdf')->middleware('auth');
});

Route::post('logout',[AuthController::class,'logout'])->name('logout');

Route::get('verify/{id}/{hash}',[AuthController::class,'verify'])->name('verification.verify');

Route::get('/auth/google/redirect', function(){
    return Socialite::driver('google')->redirect();
})->name('google');

Route::get('/auth/google/callback', function(){
    $googleUser = Socialite::driver('google')->user();

    $user = User::where('email',$googleUser->getEmail())->first();

    if($user){
        if(empty($user->image)  || !str_starts_with($user->image,'images/')){
        $user->image = $googleUser->getAvatar();
    }

    $user->save();
    }else {
        $user = User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => bcrypt(Str::password(12)),
            'image' => $googleUser->getAvatar(),
            'google_id' => $googleUser->getId()
        ]);
    }

    Auth::login($user);
    return redirect()->route('user');
});

Route::view('/profile','profile-user')->name('profile');
Route::view('/profile-admin','profile-admin')->name('profile-admin');
Route::post('/profile',[UserController::class,'ubahProfile'])->name('ubahProfile');