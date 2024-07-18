<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Homepage Bloomy Explore Sidoarjo'
        );

        return view('user/bantuan', ['data' => $data]);
    }
}
