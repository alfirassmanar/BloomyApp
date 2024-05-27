<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Dashboard Admin Bloomy Explore Sidoarjo'
        );

        return view('admin/home', ['data' => $data]);
    }

    public function login()
    {
        $data = array(
            'title' => 'Login Admin Bloomy Explore Sidoarjo'
        );

        return view('admin/auth/login', ['data' => $data]);
    }

    public function registrasi()
    {
        $data = array(
            'title' => 'Registrasi Admin Bloomy Explore Sidoarjo'
        );

        return view('admin/auth/registrasi', ['data' => $data]);
    }
}
