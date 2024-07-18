<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Wisata;
use App\Models\User;
use App\Models\Tour;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function tampilTransaksi()
    {
        $users = Tour::all();
        $pelanggan = User::where('id_role', 3)->get();
        return response()->json(['success' => true, 'users' => $users, 'pelanggan' => $pelanggan]);
    }

    public function getPaketWisataDetails($id)
    {
        $paket = Tour::with(['pekerja.user', 'wisata'])->findOrFail($id);
        $id_wisata_array = explode(',', $paket->id_wisata);

        $namaWisataList = Wisata::whereIn('id_wisata', $id_wisata_array)->get();

        if ($paket) {
            return response()->json(['success' => true, 'paket' => $paket, 'namaWisataList' => $namaWisataList]);
        } else {
            return response()->json(['success' => false, 'message' => 'Paket tidak ditemukan']);
        }
    }

    public function prosesTambahTransaksi(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id_user' => 'required|integer',
                'id_tour' => 'required|integer',
                'no_tiket' => 'required|string',
                'jumlah_pesanan' => 'required|numeric',
                'total_bayar' => 'required|numeric',
                'tgl_liburan' => 'required|date',
            ]);

            $transaksi = Transaksi::create([
                'id_user' => $validatedData['id_user'],
                'id_tour' => $validatedData['id_tour'],
                'no_tiket' => $validatedData['no_tiket'],
                'jumlah_pesanan' => $validatedData['jumlah_pesanan'],
                'total_bayar' => $validatedData['total_bayar'],
                'tgl_pesan' => $validatedData['tgl_liburan'],
            ]);

            return response()->json(['success' => true, 'transaksi' => $transaksi], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
