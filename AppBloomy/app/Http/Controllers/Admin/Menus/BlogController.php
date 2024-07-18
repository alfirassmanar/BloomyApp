<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Blog;
use App\Models\Wisata;
use App\Models\UMKM;
use App\Models\Kuliner;

use App\Models\Kategori;

class BlogController extends Controller
{
    public function tampilBlog()
    {
        $kategori = Kategori::all();
        return response()->json(['success' => true, 'kategori' => $kategori]);
    }

    public function getWisata()
    {
        $blogs = Blog::where('id_kategori', 1)
            ->with('wisata') // Memuat relasi wisata
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

    public function getUMKM()
    {
        $blogs = Blog::where('id_kategori', 2)
            ->with('umkm')
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

    public function getKuliner()
    {
        $blogs = Blog::where('id_kategori', 3)
            ->with('kuliner')
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

    public function prosesTambahBlog(Request $request)
    {
        $request->validate([
            'id_wisata' => 'required',
            'id_kategori' => 'required',
            'nama_penulis' => 'required|string',
            'artikel' => 'required|string',
            'foto_blog' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tgl_input' => 'required|date',
        ]);

        $fotoPath = $request->file('foto_blog')->store('public/admin/fotoBlog');
        $fotoName = basename($fotoPath);

        $blog = new Blog();
        $blog->id_kategori = $request->id_kategori;
        $blog->nama_penulis = $request->nama_penulis;
        $blog->artikel = $request->artikel;
        $blog->foto_blog = $fotoName;
        $blog->tgl_input = $request->tgl_input;

        // Tentukan id_wisata, id_umkm, id_kuliner berdasarkan jenis usaha terpilih
        switch ($request->id_kategori) {
            case 1: // Kategori Wisata
                $blog->id_wisata = $request->id_wisata;
                break;
            case 2: // Kategori UMKM
                $blog->id_umkm = $request->id_wisata;
                break;
            case 3: // Kategori Kuliner
                $blog->id_kuliner = $request->id_wisata;
                break;
            default:
                // Handle default case or error
                break;
        }

        $blog->save();

        return response()->json(['success' => true, 'message' => 'Blog berhasil ditambahkan.']);
    }

    public function prosesEditBlog($id_blog)
    {
        $blog = Blog::with('kategori')->findOrFail($id_blog);

        return response()->json([
            'success' => true,
            'blog' => $blog,
            'kategori' => $blog->kategori,
        ]);
    }

    public function updateBlog(Request $request, $id_blog)
    {
        $rules = [
            'id_kategori' => 'required|integer',
            'id_wisata' => 'nullable|integer',
            'id_umkm' => 'nullable|integer',
            'id_kuliner' => 'nullable|integer',
            'nama_penulis' => 'required|string|max:255',
            'artikel' => 'required|string',
            'foto_blog' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tgl_input' => 'required|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $blog = Blog::findOrFail($id_blog);
        $blog->id_kategori = $request->input('id_kategori');
        $blog->id_wisata = $request->input('id_wisata');
        $blog->id_umkm = $request->input('id_umkm');
        $blog->id_kuliner = $request->input('id_kuliner');
        $blog->nama_penulis = $request->input('nama_penulis');
        $blog->artikel = $request->input('artikel');
        $blog->tgl_input = $request->input('tgl_input');

        if ($request->hasFile('foto_blog')) {
            if ($blog->foto_blog) {
                Storage::delete('public/admin/fotoBlog/' . basename($blog->foto_blog));
            }

            $fileName = $request->file('foto_blog')->hashName();
            $request->file('foto_blog')->storeAs('public/admin/fotoBlog', $fileName);
            $blog->foto_blog = $fileName;
        }

        $blog->save();
        return response()->json(['success' => true]);
    }

    public function prosesHapusBlog($id_blog)
    {
        try {
            $blog = Blog::findOrFail($id_blog);
            $blog->delete();

            return redirect()->back()->with('success', 'Blog berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Blog: ' . $e->getMessage());
        }
    }
}
