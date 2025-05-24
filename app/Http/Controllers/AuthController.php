<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AuthController extends Controller
{
    public function auth(){
        return view('auth');
    }

    public function register(Request $request){
        $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'image' => 'required|image|max:1024',
            ],[
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email harus valid',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password minimal 6 karakter',
                'image.required' => 'foto profil harus diisi',
                'image.image' => 'foto profil harus berupa gambar',
                'image.max' => 'ukuran foto profil maksimal 1MB'
            ]);
            
        try {

            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . "_" . uniqid() . "." . $image->getClientOriginalExtension();
                $image->move(public_path('images'),$imageName);
            }

            $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'image' => $imageName
            ]);

            Notification::send($user, new VerifyEmail());

            return redirect()->route('auth')->with('success','Berhasil Mendaftar! Silahkan cek email untuk verifikasi akun anda!');
        }catch (\Exception $e) {
            return redirect()->route('auth')->with('error','Gagal Mendaftar! ' . $e);
        }    
    }
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ],[
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email harus valid',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password minimal 6 karakter',
        ]);

        if (Auth::attempt($request->only('email','password'))) {
            if(Auth::user()->email_verified_at){
                $request->session()->regenerate();
                if(Auth::user()->role === 'admin'){
                    return redirect()->route('admin')->with('success','Selamat Datang Admin!');
            }else{
                return redirect()->route('user')->with('success','Anda Berhasil Masuk');
            }
        }else{
                Auth::logout();
                return back()->with('error','Harap verifikasi akun anda!');

            }
        }

        return redirect()->route('auth')->with('error','Kombinasi email dan password salah');
    }
    
    public function verify($id, $hash){
        $user = User::findOrFail($id);
    
        if(sha1($user->getEmailForVerification()) !== $hash) {
            return redirect()->route('auth')->with('error', 'Link verifikasi tidak valid!');
        }

        if($user->hasVerifiedEmail()){
            return redirect()->route('auth')->with('success', 'Akun Anda sudah terverifikasi');
        }

        if($user->markEmailAsVerified()){
            return redirect()->route('auth')->with('success', 'Akun Anda berhasil diverifikasi');
        }

        return redirect()->route('auth')->with('error', 'Gagal verifikasi email!');
    }

    public function Logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    
}
