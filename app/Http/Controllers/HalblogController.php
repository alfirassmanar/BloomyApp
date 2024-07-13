<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalblogController extends Controller
{
    public function index()
        {
            $data = array(
                'title' => 'Homepage Bloomy Explore Sidoarjo'
            );
    
            return view('blog.halBlog', ['data' => $data]);
        }
}
