<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
        {
            $data = array(
                'title' => 'Homepage Bloomy Explore Sidoarjo'
            );
    
            return view('blogBloomy', ['data' => $data]);
        }
}
