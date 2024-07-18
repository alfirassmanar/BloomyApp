<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistToguideController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Login Bloomy Explore Sidoarjo'
        );

        return view('user.auth.registToguide', ['data' => $data]);
    }
}
