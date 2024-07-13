<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistToguideController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Login Bloomy Explore Sidoarjo'
        );

        return view('admin.auth.registToguide', ['data' => $data]);
    }
}
