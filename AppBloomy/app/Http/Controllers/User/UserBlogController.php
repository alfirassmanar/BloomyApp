<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Blog;

class UserBlogController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Homepage Bloomy Explore Sidoarjo'
        );

        return view('user/blogBloomy', ['data' => $data]);
    }

    public function userTampilBlogWisata()
    {
        $blogs = Blog::where('id_kategori', 1)
            ->with(['wisata', 'kategori'])
            ->get();

        if ($blogs->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'blogs' => $blogs,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data blog dengan id_kategori 1 tidak ditemukan.'
            ]);
        }
    }

    public function userTampilBlogUMKM()
    {
        $blogs = Blog::where('id_kategori', 2)
            ->with(['umkm', 'kategori'])
            ->get();

        if ($blogs->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'blogs' => $blogs,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data blog dengan id_kategori 2 tidak ditemukan.'
            ]);
        }
    }

    public function userTampilBlogKuliner()
    {
        $blogs = Blog::where('id_kategori', 3)
            ->with(['kuliner', 'kategori'])
            ->get();

        if ($blogs->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'blogs' => $blogs,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data blog dengan id_kategori 3 tidak ditemukan.'
            ]);
        }
    }
}
