<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
        public function index()
        {
            $data = array(
                'title' => 'Homepage Bloomy Explore Sidoarjo'
            );
    
            return view('admin.pembayaran', ['data' => $data]);
        }
}
