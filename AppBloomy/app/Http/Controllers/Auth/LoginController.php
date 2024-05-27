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

        return view('index', ['data' => $data]);
    }

    public function registrasi()
    {
        $data = array(
            'title' => 'Registrasi Bloomy Explore Sidoarjo'
        );

        return view('registrasi', ['data' => $data]);
    }
}
