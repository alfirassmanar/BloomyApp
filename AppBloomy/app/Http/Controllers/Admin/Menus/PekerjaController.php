<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Pekerja;
use App\Models\User;
use App\Models\Wisata;

class PekerjaController extends Controller
{
    public function tampilPekerja()
    {
        $pekerja = Pekerja::with('user', 'user.role', 'wisata')->paginate(2);
        return response()->json(['success' => true, 'pekerja' => $pekerja]);
    }

    public function prosesTambahPekerja(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:tb_user,id_user',
            'id_wisata' => 'required|exists:tb_wisata,id_wisata',
            'alamat_pekerja' => 'required',
            'no_hp' => 'required',
            'berkas' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'tgl_masuk' => 'required|date',
            'tgl_keluar' => 'required|date|after_or_equal:tgl_masuk',
            'foto_pekerja' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berkasPath = $request->file('berkas')->store('public/admin/fotoPekerja/berkasPekerja');
        $berkasName = basename($berkasPath);

        $fotoPekerjaPath = $request->file('foto_pekerja')->store('public/admin/fotoPekerja');
        $fotoPekerjaName = basename($fotoPekerjaPath);

        $pekerja = new Pekerja();
        $pekerja->id_user = $request->id_user;
        $pekerja->id_wisata = $request->id_wisata;
        $pekerja->alamat_pekerja = $request->alamat_pekerja;
        $pekerja->no_hp = $request->no_hp;
        $pekerja->berkas = $berkasName;
        $pekerja->tgl_masuk = $request->tgl_masuk;
        $pekerja->tgl_keluar = $request->tgl_keluar;
        $pekerja->foto_pekerja = $fotoPekerjaName;
        $pekerja->save();

        return response()->json(['message' => 'Pekerja berhasil ditambahkan']);
    }

    public function prosesEditPekerja($id_pekerja)
    {
        $pekerja = Pekerja::with('user', 'wisata')->findOrFail($id_pekerja);
        $users = User::all();
        $wisatas = Wisata::all();
        return response()->json([
            'success' => true,
            'pekerjaEdit' => $pekerja,
            'users' => $users,
            'wisatas' => $wisatas,
        ]);
    }

    public function updatePekerja(Request $request, $id_pekerja)
    {
        // Define validation rules
        $rules = [
            'id_user' => 'required|exists:tb_user,id_user',
            'id_wisata' => 'required|exists:tb_wisata,id_wisata',
            'alamat_pekerja' => 'required|string|max:255',
            'no_hp' => 'required|numeric',
            'berkas' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'foto_pekerja' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tgl_masuk' => 'required|date',
            'tgl_keluar' => 'nullable|date',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Find the pekerja by id
        $pekerja = Pekerja::findOrFail($id_pekerja);
        $pekerja->id_user = $request->input('id_user');
        $pekerja->id_wisata = $request->input('id_wisata');
        $pekerja->alamat_pekerja = $request->input('alamat_pekerja');
        $pekerja->no_hp = $request->input('no_hp');
        $pekerja->tgl_masuk = $request->input('tgl_masuk');
        $pekerja->tgl_keluar = $request->input('tgl_keluar');

        // Handle berkas file upload
        if ($request->hasFile('berkas')) {
            if ($pekerja->berkas) {
                Storage::delete('public/admin/fotoPekerja/berkasPekerja/' . basename($pekerja->berkas));
            }

            $berkasName = $request->file('berkas')->hashName();
            $request->file('berkas')->storeAs('public/admin/fotoPekerja/berkasPekerja', $berkasName);
            $pekerja->berkas = $berkasName;
        }

        // Handle foto_pekerja file upload
        if ($request->hasFile('foto_pekerja')) {
            if ($pekerja->foto_pekerja) {
                Storage::delete('public/admin/fotoPekerja/' . basename($pekerja->foto_pekerja));
            }

            $fotoName = $request->file('foto_pekerja')->hashName();
            $request->file('foto_pekerja')->storeAs('public/admin/fotoPekerja', $fotoName);
            $pekerja->foto_pekerja = $fotoName;
        }

        // Save the updated pekerja
        $pekerja->save();
        return response()->json(['success' => true]);
    }

    public function prosesHapusPekerja($id_pekerja)
    {
        try {
            $pekerja = Pekerja::findOrFail($id_pekerja);
            $pekerja->delete();

            return redirect()->back()->with('success', 'Pekerja berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Pekerja: ' . $e->getMessage());
        }
    }
}
