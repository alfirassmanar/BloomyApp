<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\Role;

class AuthController extends Controller
{

    public function prosesRegistrasi(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'email' => 'required|email|unique:tb_user',
            'nama_lengkap' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fileName = $request->file('foto')->hashName();
        $request->file('foto')->storeAs('public/admin/fotoRegistrasi', $fileName);

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->foto = $fileName;
        $user->save();

        return response()->json(['message' => 'User registered successfully']);
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->id_role == 1 || $user->id_role == 2) {
                Auth::login($user);
                $request->session()->put('user', $user);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Email atau password salah.']);
        }
    }

    public function prosesLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['success' => true]);
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login.admin.bloomy')->with('error', 'Terjadi kesalahan saat login dengan ' . ucfirst($provider));
        }

        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'username' => 'GoogleLogin',
                'email' => $socialUser->getEmail(),
                'nama_lengkap' => $socialUser->getName(),
                'id_role' => 1,
                'foto' => 'email.jpg',
                'password' => bcrypt('dummyPassword')
            ]);
        }

        if ($user->id_role == 1 || $user->id_role == 2) {
            Auth::login($user);
            // Simpan user di session menggunakan $request->session()
            session(['user' => $user]);
            return redirect()->route('dashboard.bloomy');
        } else {
            return response()->json(['success' => false, 'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
        }
    }
}
