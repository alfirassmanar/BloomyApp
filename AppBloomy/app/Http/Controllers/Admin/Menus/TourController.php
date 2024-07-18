<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Wisata;
use App\Models\Tour;

class TourController extends Controller
{
    public function tampilTour()
    {
        $tour = Tour::with('wisata')->paginate(3);
        return response()->json(['success' => true, 'tour' => $tour]);
    }

    public function prosesTambahTour(Request $request)
    {
        $request->validate([
            'nama_tour' => 'required',
            'nama_guide' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'lama_tour' => 'required',
            'id_wisata' => 'required|string', // Validasi sebagai string
            'fasilitas_penginapan' => 'required',
            'fasilitas_konsumsi' => 'required',
            'total_harga' => 'required',
        ]);

        $tour = new Tour();
        $tour->nama_tour = $request->nama_tour;
        $tour->id_pekerja = $request->nama_guide;
        $tour->tgl_mulai = $request->tgl_mulai;
        $tour->tgl_selesai = $request->tgl_selesai;
        $tour->lama_tour = $request->lama_tour;
        $tour->fasilitas_penginapan = $request->fasilitas_penginapan;
        $tour->fasilitas_konsumsi = $request->fasilitas_konsumsi;
        $tour->total_harga = $request->total_harga;
        $tour->id_wisata = $request->id_wisata;
        $tour->save();

        return response()->json(['message' => 'Tour berhasil ditambahkan']);
    }

    public function prosesEditTour($id_tour)
    {
        try {
            $tour = Tour::findOrFail($id_tour);

            return response()->json([
                'success' => true,
                'tour' => $tour,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data tour.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function updateTour(Request $request, $id_tour)
    {
        $rules = [
            'nama_tour' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'id_wisata' => 'required',
            'fasilitas_penginapan' => 'required|string|max:255',
            'fasilitas_konsumsi' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $tour = Tour::findOrFail($id_tour);
        $tour->nama_tour = $request->input('nama_tour');
        $tour->tgl_mulai = $request->input('tgl_mulai');
        $tour->tgl_selesai = $request->input('tgl_selesai');
        $tour->id_wisata = $request->input('id_wisata');
        $tour->fasilitas_penginapan = $request->input('fasilitas_penginapan');
        $tour->fasilitas_konsumsi = $request->input('fasilitas_konsumsi');

        $tour->save();

        return response()->json(['success' => true]);
    }

    public function prosesHapusTour($id_tour)
    {
        try {
            $tour = Tour::findOrFail($id_tour);
            $tour->delete();

            return redirect()->back()->with('success', 'Tour berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Tour: ' . $e->getMessage());
        }
    }
}
