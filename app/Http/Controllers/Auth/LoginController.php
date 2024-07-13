<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Login Bloomy Explore Sidoarjo'
        );

        return view('admin.auth.login', ['data' => $data]);
    }

    public function registrasi()
    {
        $data = array(
            'title' => 'Registrasi Bloomy Explore Sidoarjo'
        );

        return view('admin.auth.registrasi', ['data' => $data]);
    }
}
