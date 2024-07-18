<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Laporan;
use App\Models\Wisata;
use App\Models\UMKM;
use App\Models\Kuliner;
use App\Models\Transaksi;
use App\Models\Pekerja;

class LaporanController extends Controller
{

    public function tampilLaporanMingguan()
    {
        $currentDate = Carbon::now();
        $startOfWeek = $currentDate->startOfWeek()->format('Y-m-d');
        $endOfWeek = $currentDate->endOfWeek()->format('Y-m-d');

        $countWisata = Wisata::whereBetween('tgl_input', [$startOfWeek, $endOfWeek])->count();
        $countUMKM = UMKM::whereBetween('tgl_input', [$startOfWeek, $endOfWeek])->count();
        $countKuliner = Kuliner::whereBetween('tgl_input', [$startOfWeek, $endOfWeek])->count();

        try {
            // Ambil data Wisata
            $dataWisata = Wisata::whereBetween('tgl_input', [$startOfWeek, $endOfWeek])->get();

            // Ambil data UMKM
            $dataUMKM = UMKM::whereBetween('tgl_input', [$startOfWeek, $endOfWeek])->get();

            // Ambil data Kuliner
            $dataKuliner = Kuliner::whereBetween('tgl_input', [$startOfWeek, $endOfWeek])->get();

            // Gabungkan semua data menjadi satu array
            $data = $dataWisata->merge($dataUMKM)->merge($dataKuliner);

            // return response()->json(['success' => true, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

        return response()->json(['count' => $countWisata, 'countUMKM' => $countUMKM, 'countKuliner' => $countKuliner, 'success' => true, 'data' => $data]);
    }

    public function tampilLaporanBulanan()
    {
        // Ambil tanggal awal dan akhir bulan ini
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');

        try {
            // Hitung jumlah data Wisata
            $countWisata = Wisata::whereBetween('tgl_input', [$startOfMonth, $endOfMonth])->count();

            // Hitung jumlah data UMKM
            $countUMKM = UMKM::whereBetween('tgl_input', [$startOfMonth, $endOfMonth])->count();

            // Hitung jumlah data Kuliner
            $countKuliner = Kuliner::whereBetween('tgl_input', [$startOfMonth, $endOfMonth])->count();

            // Ambil data Wisata
            $dataWisata = Wisata::whereBetween('tgl_input', [$startOfMonth, $endOfMonth])->get();

            // Ambil data UMKM
            $dataUMKM = UMKM::whereBetween('tgl_input', [$startOfMonth, $endOfMonth])->get();

            // Ambil data Kuliner
            $dataKuliner = Kuliner::whereBetween('tgl_input', [$startOfMonth, $endOfMonth])->get();

            // Gabungkan semua data menjadi satu array
            $data = $dataWisata->merge($dataUMKM)->merge($dataKuliner);

            return response()->json([
                'count' => $countWisata,
                'countUMKM' => $countUMKM,
                'countKuliner' => $countKuliner,
                'success' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function tampilLaporanKategori_Wisata()
    {
    }

    public function tampilRekapData(Request $request)
    {
        $currentDate = Carbon::now();
        $startOfDay = $currentDate->startOfDay()->format('Y-m-d H:i:s');
        $endOfDay = $currentDate->endOfDay()->format('Y-m-d H:i:s');

        $startOfWeek = $currentDate->startOfWeek()->format('Y-m-d H:i:s');
        $endOfWeek = $currentDate->endOfWeek()->format('Y-m-d H:i:s');

        $startOfMonth = $currentDate->startOfMonth()->format('Y-m-d H:i:s');
        $endOfMonth = $currentDate->endOfMonth()->format('Y-m-d H:i:s');

        $data = [
            'harian' => [
                'umkm' => UMKM::whereBetween('tgl_input', [$startOfDay, $endOfDay])->count(),
                'wisata' => Wisata::whereBetween('tgl_input', [$startOfDay, $endOfDay])->count(),
                'kuliner' => Kuliner::whereBetween('tgl_input', [$startOfDay, $endOfDay])->count()
            ],
            'mingguan' => [
                'umkm' => UMKM::whereBetween('tgl_input', [$startOfWeek, $endOfWeek])->count(),
                'wisata' => Wisata::whereBetween('tgl_input', [$startOfWeek, $endOfWeek])->count(),
                'kuliner' => Kuliner::whereBetween('tgl_input', [$startOfWeek, $endOfWeek])->count()
            ],
            'bulanan' => [
                'umkm' => UMKM::whereBetween('tgl_input', [$startOfMonth, $endOfMonth])->count(),
                'wisata' => Wisata::whereBetween('tgl_input', [$startOfMonth, $endOfMonth])->count(),
                'kuliner' => Kuliner::whereBetween('tgl_input', [$startOfMonth, $endOfMonth])->count()
            ]
        ];

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function tampilRekapTransaksi(Request $request)
    {
        $dataTransaksi = Transaksi::with(['user:id_user,nama_lengkap', 'tour:id_tour,nama_tour,id_wisata,id_pekerja'])
            ->get()
            ->map(function ($transaksi) {
                $transaksi->tour->wisata_names = Wisata::whereIn('id_wisata', explode(',', $transaksi->tour->id_wisata))->pluck('nama_wisata');
                $transaksi->tour->alamat_pekerja = Pekerja::find($transaksi->tour->id_pekerja)->alamat_pekerja ?? 'Unknown';
                return $transaksi;
            });

        return response()->json(['success' => true, 'data' => $dataTransaksi]);
    }
}
