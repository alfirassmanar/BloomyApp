<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class UserLoginController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Login Bloomy Explore Sidoarjo'
        );

        return view('user.auth.login', ['data' => $data]);
    }

    public function prosesUserLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->id_role == 3) {
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

    public function prosesUserLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['success' => true]);
    }

    public function registrasi()
    {
        $data = array(
            'title' => 'Registrasi Bloomy Explore Sidoarjo'
        );

        return view('user.auth.registrasi', ['data' => $data]);
    }

    public function prosesUserRegistrasi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:tb_user',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:tb_user',
            'nama_lengkap' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        $fileName = $request->file('foto')->hashName();
        $request->file('foto')->storeAs('public/admin/fotoRegistrasi', $fileName);

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->foto = $fileName;
        $user->save();

        return response()->json(['success' => true, 'message' => 'User registered successfully']);
    }
}
