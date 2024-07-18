<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\UMKM;

class UMKMController extends Controller
{
    public function tampilUMKM()
    {
        $umkms = Umkm::with('kategori')->paginate(2);
        return response()->json(['success' => true, 'umkms' => $umkms]);
    }

    public function prosesTambahUMKM(Request $request)
    {
        $request->validate([
            'nama_umkm' => 'required',
            'id_kategori' => 'required',
            'keterangan' => 'required',
            'foto_usaha' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tgl_berdiri' => 'required|date',
            'tgl_input' => 'required|date',
            'lokasi' => 'required',
        ]);

        $fotoPath = $request->file('foto_usaha')->store('public/admin/fotoUMKM');
        $fotoName = basename($fotoPath);

        $wisata = new UMKM();
        $wisata->nama_umkm = $request->nama_umkm;
        $wisata->id_kategori = $request->id_kategori;
        $wisata->keterangan = $request->keterangan;
        $wisata->foto_usaha = $fotoName;
        $wisata->tgl_berdiri = $request->tgl_berdiri;
        $wisata->tgl_input = $request->tgl_input;
        $wisata->lokasi = $request->lokasi;
        $wisata->save();

        return response()->json(['message' => 'Data wisata berhasil ditambahkan']);
    }

    public function prosesEditUMKM($id_umkm)
    {
        $umkm = UMKM::findOrFail($id_umkm);
        return response()->json([
            'success' => true,
            'umkm' => $umkm,
        ]);
    }

    public function updateUMKM(Request $request, $id_umkm)
    {
        $rules = [
            'nama_umkm' => 'required|string|max:255',
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

        $umkm = UMKM::findOrFail($id_umkm);
        $umkm->nama_umkm = $request->input('nama_umkm');
        $umkm->id_kategori = $request->input('id_kategori');
        $umkm->keterangan = $request->input('keterangan');
        $umkm->tgl_berdiri = $request->input('tgl_berdiri');
        $umkm->tgl_input = $request->input('tgl_input');
        $umkm->lokasi = $request->input('lokasi');

        if ($request->hasFile('foto_usaha')) {
            if ($umkm->foto_usaha) {
                Storage::delete('public/admin/fotoUMKM/' . basename($umkm->foto_usaha));
            }

            $fileName = $request->file('foto_usaha')->hashName();
            $request->file('foto_usaha')->storeAs('public/admin/fotoUMKM', $fileName);
            $umkm->foto_usaha = $fileName;
        }

        $umkm->save();
        return response()->json(['success' => true]);
    }

    public function prosesHapusUMKM($id_umkm)
    {
        try {
            $umkm = UMKM::findOrFail($id_umkm);
            $umkm->delete();

            return redirect()->back()->with('success', 'UMKM berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus UMKM: ' . $e->getMessage());
        }
    }
}
