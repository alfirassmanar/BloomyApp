<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index()
        {
            $data = array(
                'title' => 'Homepage Bloomy Explore Sidoarjo'
            );
    
            return view('homeBloomy', ['data' => $data]);
        }
}