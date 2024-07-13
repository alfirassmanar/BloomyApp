<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BantuanController extends Controller
{
    public function index()
        {
            $data = array(
                'title' => 'Homepage Bloomy Explore Sidoarjo'
            );
    
            return view('bantuan', ['data' => $data]);
        }
}
