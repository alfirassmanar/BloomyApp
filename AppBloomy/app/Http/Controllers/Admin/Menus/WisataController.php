<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Wisata;

class WisataController extends Controller
{
    public function tampilWisata()
    {
        $wisatas = Wisata::with('kategori')->paginate(2);
        return response()->json(['success' => true, 'wisatas' => $wisatas]);
    }

    public function prosesTambahWisata(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_wisata' => 'required',
            'keterangan' => 'required',
            'foto_usaha' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tgl_berdiri' => 'required|date',
            'tgl_input' => 'required|date',
            'lokasi' => 'required',
        ]);

        $fotoPath = $request->file('foto_usaha')->store('public/admin/fotoWisata');
        $fotoName = basename($fotoPath);

        $wisata = new Wisata();
        $wisata->id_kategori = $request->id_kategori;
        $wisata->nama_wisata = $request->nama_wisata;
        $wisata->keterangan = $request->keterangan;
        $wisata->foto_usaha = $fotoName;
        $wisata->tgl_berdiri = $request->tgl_berdiri;
        $wisata->tgl_input = $request->tgl_input;
        $wisata->lokasi = $request->lokasi;
        $wisata->save();

        return response()->json(['message' => 'Data wisata berhasil ditambahkan']);
    }

    public function prosesEditWisata($id_wisata)
    {
        $wisata = Wisata::findOrFail($id_wisata);
        return response()->json([
            'success' => true,
            'wisata' => $wisata,
        ]);
    }

    public function updateWisata(Request $request, $id_wisata)
    {
        $rules = [
            'nama_wisata' => 'required|string|max:255',
            'id_kategori' => 'required',
            'keterangan' => 'required|string|max:255',
            'foto_usaha' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tgl_berdiri' => 'required|date',
            'tgl_input' => 'required|date',
            'lokasi' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $wisata = Wisata::findOrFail($id_wisata);
        $wisata->nama_wisata = $request->input('nama_wisata');
        $wisata->id_kategori = $request->input('id_kategori');
        $wisata->keterangan = $request->input('keterangan');
        $wisata->tgl_berdiri = $request->input('tgl_berdiri');
        $wisata->tgl_input = $request->input('tgl_input');
        $wisata->lokasi = $request->input('lokasi');

        if ($request->hasFile('foto_usaha')) {
            // Hapus foto lama jika ada
            if ($wisata->foto_usaha) {
                Storage::delete('public/admin/fotoWisata/' . basename($wisata->foto_usaha));
            }

            // Simpan foto baru
            $fileName = $request->file('foto_usaha')->hashName();
            $request->file('foto_usaha')->storeAs('public/admin/fotoWisata', $fileName);
            $wisata->foto_usaha = $fileName;
        }

        $wisata->save();
        return response()->json(['success' => true]);
    }

    public function prosesHapusWisata($id_wisata)
    {
        try {
            $wisata = Wisata::findOrFail($id_wisata);
            $wisata->delete();

            return redirect()->back()->with('success', 'Wisata berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Wisata: ' . $e->getMessage());
        }
    }
}
