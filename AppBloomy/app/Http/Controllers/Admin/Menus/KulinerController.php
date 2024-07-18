<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Kuliner;

class KulinerController extends Controller
{
    public function tampilKuliner()
    {
        $kuliner = Kuliner::with('kategori')->paginate(2);
        return response()->json(['success' => true, 'kuliner' => $kuliner]);
    }

    public function prosesTambahKuliner(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_kuliner' => 'required',
            'keterangan' => 'required',
            'foto_usaha' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tgl_berdiri' => 'required|date',
            'tgl_input' => 'required|date',
            'lokasi' => 'required',
        ]);

        $fotoPath = $request->file('foto_usaha')->store('public/admin/fotoKuliner');
        $fotoName = basename($fotoPath);

        $wisata = new Kuliner();
        $wisata->id_kategori = $request->kategori;
        $wisata->nama_kuliner = $request->nama_kuliner;
        $wisata->keterangan = $request->keterangan;
        $wisata->foto_usaha = $fotoName;
        $wisata->tgl_berdiri = $request->tgl_berdiri;
        $wisata->tgl_input = $request->tgl_input;
        $wisata->lokasi = $request->lokasi;
        $wisata->save();

        return response()->json(['message' => 'Data wisata berhasil ditambahkan']);
    }

    public function prosesEditKuliner($id_kuliner)
    {
        $kuliner = Kuliner::findOrFail($id_kuliner);
        return response()->json([
            'success' => true,
            'kuliner' => $kuliner,
        ]);
    }

    public function updateKuliner(Request $request, $id_kuliner)
    {
        $rules = [
            'id_kategori' => 'required',
            'nama_kuliner' => 'required|string|max:255',
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

        $kuliner = Kuliner::findOrFail($id_kuliner);
        $kuliner->id_kategori = $request->input('id_kategori');
        $kuliner->nama_kuliner = $request->input('nama_kuliner');
        $kuliner->keterangan = $request->input('keterangan');
        $kuliner->tgl_berdiri = $request->input('tgl_berdiri');
        $kuliner->tgl_input = $request->input('tgl_input');
        $kuliner->lokasi = $request->input('lokasi');

        if ($request->hasFile('foto_usaha')) {
            if ($kuliner->foto_usaha) {
                Storage::delete('public/admin/fotoKuliner/' . basename($kuliner->foto_usaha));
            }

            $fileName = $request->file('foto_usaha')->hashName();
            $request->file('foto_usaha')->storeAs('public/admin/fotoKuliner', $fileName);
            $kuliner->foto_usaha = $fileName;
        }

        $kuliner->save();
        return response()->json(['success' => true]);
    }

    public function prosesHapusKuliner($id_kuliner)
    {
        try {
            $kuliner = Kuliner::findOrFail($id_kuliner);
            $kuliner->delete();

            return redirect()->back()->with('success', 'Kuliner berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Kuliner: ' . $e->getMessage());
        }
    }
}
