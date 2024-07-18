<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;

class HomeController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Homepage Bloomy Explore Sidoarjo'
        );

        return view('user/homeBloomy', ['data' => $data]);
    }

    public function userTampilTour()
    {
        $tour = Tour::with('wisata')->paginate(3);
        return response()->json(['success' => true, 'tour' => $tour]);
    }
}
