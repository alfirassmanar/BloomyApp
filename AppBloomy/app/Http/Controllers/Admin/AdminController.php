<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Dompdf\Dompdf;
use Dompdf\Options;
// use Maatwebsite\Excel\Facades\Excel;
// use App\Exports\LaporanExport;

// use App\Http\Middleware\Check_LoginAdmin;

use App\Models\User;
use App\Models\Wisata;
use App\Models\UMKM;
use App\Models\Kuliner;
use App\Models\Kategori;
use App\Models\Blog;
use App\Models\Role;
use App\Models\Pekerja;
use App\Models\Tour;
use App\Models\Laporan;
use App\Models\Pertanyaan;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $data = array(
            'title' => 'Dashboard Admin Bloomy Explore Sidoarjo'
        );

        $user = $request->session()->get('user');
        return view('admin/home', ['data' => $data, 'user' => $user]);
    }

    public function login()
    {
        $data = array(
            'title' => 'Login Admin Bloomy Explore Sidoarjo'
        );

        return view('admin/auth/login', ['data' => $data]);
    }

    public function registrasi()
    {
        $data = array(
            'title' => 'Registrasi Admin Bloomy Explore Sidoarjo'
        );

        return view('admin/auth/registrasi', ['data' => $data]);
    }

    // ---------------------------------------------------

    public function mProfile(Request $request)
    {
        $data = array(
            'title' => 'Admin - Menu Admin'
        );
        $user = $request->session()->get('user');
        return view('admin/menus/mProfile', ['data' => $data, 'user' => $user]);
    }

    // ---------------------------------------------------

    public function mUser(Request $request)
    {
        $data = array(
            'title' => 'Admin - Menu Admin'
        );
        $user = $request->session()->get('user');
        return view('admin/menus/mUser', ['data' => $data, 'user' => $user]);
    }

    public function mUserEdit($id_user)
    {
        $data = [
            'title' => 'Admin - Menu Admin / Edit',
            'id_user' => $id_user,
            'userEdit' => User::findOrFail($id_user),
        ];

        $user = User::findOrFail($id_user);

        return view('admin.menus.edit.mUserEdit', compact('data', 'user'));
    }

    public function mUserTambah(Request $request)
    {
        $kategori = Kategori::all();
        $roles = Role::all();
        $userTambah = new User();

        $data = [
            'title' => 'Admin - Menu Admin / Tambah',
            'userTambah' => $userTambah,
            'kategori' => $kategori,
            'roles' => $roles,
        ];

        $user = $request->session()->get('user');

        return view('admin.menus.add.mUserTambah', compact('data', 'user', 'kategori', 'roles'));
    }

    // ---------------------------------------------------

    public function mPelanggan(Request $request)
    {
        $data = array(
            'title' => 'Admin - Menu Admin'
        );
        $user = $request->session()->get('user');
        return view('admin/menus/mPelanggan', ['data' => $data, 'user' => $user]);
    }

    public function mPelangganEdit($id_user)
    {
        $data = [
            'title' => 'Admin - Menu Admin / Edit',
            'id_user' => $id_user,
            'userEdit' => User::findOrFail($id_user),
        ];

        $user = User::findOrFail($id_user);

        return view('admin.menus.edit.mPelangganEdit', compact('data', 'user'));
    }

    public function mPelangganTambah(Request $request)
    {
        $kategori = Kategori::all();
        $roles = Role::all();
        $userTambah = new User();

        $data = [
            'title' => 'Admin - Menu Admin / Tambah',
            'userTambah' => $userTambah,
            'kategori' => $kategori,
            'roles' => $roles,
        ];

        $user = $request->session()->get('user');

        return view('admin.menus.add.mPelangganTambah', compact('data', 'user', 'kategori', 'roles'));
    }

    // ---------------------------------------------------

    public function mWisata(Request $request)
    {
        $data = array(
            'title' => 'Admin - Menu Wisata'
        );
        $user = $request->session()->get('user');
        return view('admin/menus/mWisata', ['data' => $data, 'user' => $user]);
    }

    public function mWisataEdit($id_wisata)
    {
        $wisata = Wisata::with('kategori')->findOrFail($id_wisata);

        $kategori = Kategori::all();

        $data = [
            'title' => 'Admin - Menu Wisata / Edit',
            'id_wisata' => $id_wisata,
            'wisata' => $wisata,
        ];

        $user = auth()->user();
        return view('admin.menus.edit.mWisataEdit', compact('data', 'user', 'kategori'));
    }


    public function mWisataTambah(Request $request)
    {
        $kategori = Kategori::all();
        $wisataTambah = new Wisata();

        $data = [
            'title' => 'Admin - Menu Admin / Tambah',
            'wisataTambah' => $wisataTambah,
            'kategori' => $kategori,
        ];

        $user = $request->session()->get('user');

        return view('admin.menus.add.mWisataTambah', compact('data', 'user', 'kategori'));
    }

    public function mWisataDetail($id_wisata)
    {
        $data = [
            'title' => 'Admin - Menu Wisata / Detail',
            'id_wisata' => $id_wisata,
            'wisata' => Wisata::findOrFail($id_wisata),
        ];

        $kategori = Kategori::all();

        $user = auth()->user();
        return view('admin.menus.detail.mWisataDetail', compact('data', 'user', 'kategori'));
    }

    // ---------------------------------------------------

    public function mUMKM(Request $request)
    {
        $data = array(
            'title' => 'Admin - Menu UMKM'
        );
        $user = $request->session()->get('user');
        return view('admin/menus/mUMKM', ['data' => $data, 'user' => $user]);
    }

    public function mUMKMTambah(Request $request)
    {
        $kategori = Kategori::all();
        $UMKMTambah = new UMKM();

        $data = [
            'title' => 'Admin - Menu Admin / Tambah',
            'UMKMTambah' => $UMKMTambah,
            'kategori' => $kategori,
        ];

        $user = $request->session()->get('user');

        return view('admin.menus.add.mUMKMTambah', compact('data', 'user', 'kategori'));
    }

    public function mUMKMEdit($id_umkm)
    {
        $umkm = Umkm::with('kategori')->findOrFail($id_umkm);

        $data = [
            'title' => 'Admin - Menu UMKM / Edit',
            'id_umkm' => $id_umkm,
            'umkm' => Umkm::findOrFail($id_umkm),
        ];

        $kategori = Kategori::all();

        $user = auth()->user();
        return view('admin.menus.edit.mUMKMEdit', compact('data', 'user', 'kategori'));
    }

    public function mUMKMDetail($id_umkm)
    {
        $data = [
            'title' => 'Admin - Menu UMKM / Detail',
            'id_umkm' => $id_umkm,
            'umkm' => UMKM::findOrFail($id_umkm),
        ];

        $kategori = Kategori::all();

        $user = auth()->user();
        return view('admin.menus.detail.mUMKMDetail', compact('data', 'user', 'kategori'));
    }

    // ---------------------------------------------------

    public function mKuliner(Request $request)
    {
        $data = array(
            'title' => 'Admin - Menu Kuliner'
        );
        $user = $request->session()->get('user');
        return view('admin/menus/mKuliner', ['data' => $data, 'user' => $user]);
    }

    public function mKulinerTambah(Request $request)
    {
        $kategori = Kategori::all();
        $KulinerTambah = new Kuliner();

        $data = [
            'title' => 'Admin - Menu Kuliner / Tambah',
            'KulinerTambah' => $KulinerTambah,
            'kategori' => $kategori,
        ];

        $user = $request->session()->get('user');

        return view('admin.menus.add.mKulinerTambah', compact('data', 'user', 'kategori'));
    }

    public function mKulinerEdit($id_kuliner)
    {
        $umkm = Kuliner::with('kategori')->findOrFail($id_kuliner);

        $data = [
            'title' => 'Admin - Menu Kuliner / Edit',
            'id_kuliner' => $id_kuliner,
            'kuliner' => Kuliner::findOrFail($id_kuliner),
        ];

        $kategori = Kategori::all();

        $user = auth()->user();
        return view('admin.menus.edit.mKulinerEdit', compact('data', 'user', 'kategori'));
    }

    public function mKulinerDetail($id_kuliner)
    {
        $data = [
            'title' => 'Admin - Menu Kuliner / Detail',
            'id_kuliner' => $id_kuliner,
            'kuliner' => Kuliner::findOrFail($id_kuliner),
        ];

        $kategori = Kategori::all();

        $user = auth()->user();
        return view('admin.menus.detail.mKulinerDetail', compact('data', 'user', 'kategori'));
    }

    // ---------------------------------------------------
    public function mBlog(Request $request)
    {
        $data = array(
            'title' => 'Admin - Menu Blog / Artikel'
        );
        $user = $request->session()->get('user');
        return view('admin/menus/mBlog', ['data' => $data, 'user' => $user]);
    }

    public function mBlogTambah(Request $request)
    {
        $kategori = Kategori::all();
        $wisata = Wisata::all();
        $umkm = UMKM::all();
        $kuliner = Kuliner::all();

        $data = [
            'title' => 'Admin - Menu Blog / Tambah',
            'kategori' => $kategori,
        ];

        $usaha = [
            'wisata' => $wisata,
            'umkm' => $umkm,
            'kuliner' => $kuliner,
        ];

        $user = $request->session()->get('user');

        return view('admin.menus.add.mBlogTambah', compact('data', 'usaha', 'user'));
    }

    public function getUsahaKategori(Request $request)
    {
        $id_kategori = $request->input('id_kategori');
        $usaha = [];

        // Ambil data dari tabel Wisata
        $wisata = Wisata::where('id_kategori', $id_kategori)->get();
        foreach ($wisata as $item) {
            $usaha[] = [
                'id' => $item->id_wisata,
                'nama' => $item->nama_wisata,
                'jenis' => 'Wisata'
            ];
        }

        // Ambil data dari tabel UMKM
        $umkm = UMKM::where('id_kategori', $id_kategori)->get();
        foreach ($umkm as $item) {
            $usaha[] = [
                'id' => $item->id_umkm,
                'nama' => $item->nama_umkm,
                'jenis' => 'UMKM'
            ];
        }

        // Ambil data dari tabel Kuliner
        $kuliner = Kuliner::where('id_kategori', $id_kategori)->get();
        foreach ($kuliner as $item) {
            $usaha[] = [
                'id' => $item->id_kuliner,
                'nama' => $item->nama_kuliner,
                'jenis' => 'Kuliner'
            ];
        }

        return response()->json($usaha);
    }

    public function mWisataBlogEdit($id_blog)
    {
        $data = [
            'title' => 'Admin - Menu Blog Artikel / Edit',
            'id_blog' => $id_blog,
            'blog' => Blog::findOrFail($id_blog),
        ];

        $kategoriList = Kategori::all();

        $user = auth()->user();
        return view('admin.menus.edit.mBlogEdit', compact('data', 'user', 'kategoriList'));
    }

    public function getDataByKategori($id_kategori)
    {
        $wisata = Wisata::where('id_kategori', $id_kategori)->get();
        $umkm = Umkm::where('id_kategori', $id_kategori)->get();
        $kuliner = Kuliner::where('id_kategori', $id_kategori)->get();

        return response()->json([
            'wisata' => $wisata,
            'umkm' => $umkm,
            'kuliner' => $kuliner,
        ]);
    }

    public function mBlogDetail($id_blog)
    {
        $blog = Blog::with(['wisata', 'umkm', 'kuliner'])->findOrFail($id_blog);

        if ($blog->wisata) {
            $lokasi = $blog->wisata->lokasi;
        } elseif ($blog->umkm) {
            $lokasi = $blog->umkm->lokasi;
        } elseif ($blog->kuliner) {
            $lokasi = $blog->kuliner->lokasi;
        } else {
            $lokasi = null;
        }

        $data = [
            'title' => 'Admin - Menu Blog / Detail',
            'id_blog' => $id_blog,
            'blog' => $blog,
            'lokasi' => $lokasi,
        ];

        $kategori = Kategori::all();
        $user = auth()->user();

        return view('admin.menus.detail.mBlogDetail', compact('data', 'user', 'kategori'));
    }

    // ---------------------------------------------------

    public function mPekerja(Request $request)
    {
        $data = array(
            'title' => 'Admin - Menu Pekerja'
        );
        $user = $request->session()->get('user');
        return view('admin/menus/mPekerja', ['data' => $data, 'user' => $user]);
    }

    public function mPekerjaEdit($id_pekerja)
    {
        $getUser = User::all();
        $getWisata = Wisata::all();
        $pekerjaTambah = new Pekerja();

        $data = [
            'title' => 'Admin - Menu Blog Artikel / Edit',
            'id_pekerja' => $id_pekerja,
            'pekerjaEdit' => Pekerja::findOrFail($id_pekerja),
            'getUser' => $getUser,
            'getWisata' => $getWisata,
        ];

        $user = auth()->user();
        return view('admin.menus.edit.mPekerjaEdit', compact('data', 'user', 'getUser', 'getWisata'));
    }

    public function mPekerjaTambah(Request $request)
    {
        $getUser = User::all();
        $getWisata = Wisata::all();
        $pekerjaTambah = new Pekerja();

        $data = [
            'title' => 'Admin - Menu Pekerja / Tambah',
            'pekerjaTambah' => $pekerjaTambah,
            'getUser' => $getUser,
            'getWisata' => $getWisata,
        ];

        $user = $request->session()->get('user');

        return view('admin.menus.add.mPekerjaTambah', compact('data', 'user', 'getUser', 'getWisata'));
    }

    // ---------------------------------------------------

    public function mTour(Request $request)
    {
        $data = array(
            'title' => 'Admin - Menu Tour Paket'
        );
        $user = $request->session()->get('user');
        return view('admin/menus/mTour', ['data' => $data, 'user' => $user]);
    }

    public function mTourTambah(Request $request)
    {
        $getWisata = Wisata::all();
        $getPekerja = Pekerja::all();

        $data = [
            'title' => 'Admin - Menu Tour / Tambah',
            'getWisata' => $getWisata,
            'getPekerja' => $getPekerja,
        ];

        $user = $request->session()->get('user');
        return view('admin.menus.add.mTourTambah', compact('data', 'user', 'getWisata', 'getPekerja'));
    }

    public function mTourEdit($id_tour)
    {
        $getWisata = Wisata::all();

        $tourEdit = Tour::findOrFail($id_tour);
        $id_wisata_array = explode(',', $tourEdit->id_wisata);

        $namaWisataList = Wisata::whereIn('id_wisata', $id_wisata_array)->get();

        $data = [
            'title' => 'Admin - Menu Blog Tour / Edit',
            'id_tour' => $id_tour,
            'tourEdit' => $tourEdit,
            'getWisata' => $getWisata,
            'namaWisataList' => $namaWisataList,
        ];

        $user = auth()->user();
        return view('admin.menus.edit.mTourEdit', compact('data', 'user', 'getWisata', 'namaWisataList'));
    }

    public function mTourDetail($id_tour)
    {
        try {
            $tourTampil = Tour::with('pekerja.user')->findOrFail($id_tour);
            $id_wisata_array = explode(',', $tourTampil->id_wisata);

            $namaWisataList = Wisata::whereIn('id_wisata', $id_wisata_array)->get();

            $wisata = Wisata::all();

            $data = [
                'title' => 'Admin - Menu Tour / Detail',
                'id_tour' => $id_tour,
                'wisata' => $wisata,
                'tourTampil' => Tour::findOrFail($id_tour),
                'namaWisataList' => $namaWisataList,
            ];

            $user = auth()->user();
            return view('admin.menus.detail.mTourDetail', compact('data', 'user', 'wisata', 'tourTampil', 'namaWisataList'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menampilkan detail tour.');
        }
    }

    public function mCetakTourInvoice($id_tour)
    {
        $tourTampil = Tour::with('pekerja.user')->findOrFail($id_tour);
        $id_wisata_array = explode(',', $tourTampil->id_wisata);
        $namaWisataList = Wisata::whereIn('id_wisata', $id_wisata_array)->get();

        $data = [
            'tourTampil' => $tourTampil,
            'namaWisataList' => $namaWisataList,
        ];

        $pdf = $this->generatePDF($data);

        return $pdf->stream('invoice_' . date('Ymd_His') . '.pdf');
    }

    private function generatePDF($data)
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($pdfOptions);
        $html = view('admin.menus.invoice.mCetakTourInvoice', compact('data'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf;
    }

    public function jsonTour()
    {
        $jsonPath = public_path('dataPenginapan.json');

        $json = File::get($jsonPath);
        $data = json_decode($json, true);

        return response()->json($data);
    }

    // ---------------------------------------------------

    public function mTransaksi(Request $request)
    {
        $data = array(
            'title' => 'Admin - Menu Tour Transaksi'
        );
        $user = $request->session()->get('user');
        return view('admin/menus/mTransaksi', ['data' => $data, 'user' => $user]);
    }

    // ---------------------------------------------------
    public function mLaporanMingguan(Request $request)
    {
        $laporansPaginate = Laporan::paginate(5);
        $laporans = Laporan::all();

        foreach ($laporans as $laporan) {
            $id_pertanyaan_array = explode(',', $laporan->id_pertanyaan);
            $pertanyaans = Pertanyaan::whereIn('id_pertanyaan', $id_pertanyaan_array)->get();
            $laporan->pertanyaans = $pertanyaans;
        }
        $data = array(
            'title' => 'Admin - Menu Laporan'
        );

        $user = $request->session()->get('user');
        return view('admin.menus.mLaporanMingguan', ['data' => $data, 'user' => $user, 'laporans' => $laporans, 'laporansPaginate' => $laporansPaginate]);
    }

    public function mLaporanBulanan(Request $request)
    {
        $laporansPaginate = Laporan::paginate(5);
        $laporans = Laporan::all();

        foreach ($laporans as $laporan) {
            $id_pertanyaan_array = explode(',', $laporan->id_pertanyaan);
            $pertanyaans = Pertanyaan::whereIn('id_pertanyaan', $id_pertanyaan_array)->get();
            $laporan->pertanyaans = $pertanyaans;
        }
        $data = array(
            'title' => 'Admin - Menu Laporan'
        );

        $user = $request->session()->get('user');
        return view('admin.menus.mLaporanBulanan', ['data' => $data, 'user' => $user, 'laporans' => $laporans, 'laporansPaginate' => $laporansPaginate]);
    }

    public function mLaporanKategoriWisata(Request $request)
    {
        $laporansPaginate = Laporan::paginate(5);
        $laporans = Laporan::all();

        foreach ($laporans as $laporan) {
            $id_pertanyaan_array = explode(',', $laporan->id_pertanyaan);
            $pertanyaans = Pertanyaan::whereIn('id_pertanyaan', $id_pertanyaan_array)->get();
            $laporan->pertanyaans = $pertanyaans;
        }
        $data = array(
            'title' => 'Admin - Menu Laporan'
        );

        $user = $request->session()->get('user');
        return view('admin.menus.mLaporanKategoriWisata', ['data' => $data, 'user' => $user, 'laporans' => $laporans, 'laporansPaginate' => $laporansPaginate]);
    }

    public function mRekapData(Request $request)
    {
        $data = array(
            'title' => 'Menu - Rekap Data'
        );

        $user = $request->session()->get('user');
        return view('admin.menus.mRekapData', ['data' => $data, 'user' => $user]);
    }
    // ---------------------------------------------------

    public function mKalkulasi(Request $request)
    {
        $laporansPaginate = Laporan::paginate(5);
        $laporans = Laporan::all();

        foreach ($laporans as $laporan) {
            $id_pertanyaan_array = explode(',', $laporan->id_pertanyaan);
            $pertanyaans = Pertanyaan::whereIn('id_pertanyaan', $id_pertanyaan_array)->get();
            $laporan->pertanyaans = $pertanyaans;
        }
        $data = array(
            'title' => 'Admin - Menu Laporan'
        );

        $user = $request->session()->get('user');
        return view('admin.menus.mKalkulasi', ['data' => $data, 'user' => $user, 'laporans' => $laporans, 'laporansPaginate' => $laporansPaginate]);
    }


    // public function generateStatistics(Request $request)
    // {
    //     // Validasi request untuk memastikan file CSV diunggah
    //     $request->validate([
    //         'csv_file' => 'required|mimes:csv,txt|max:2048', // sesuaikan dengan jenis file dan ukuran maksimal yang diizinkan
    //     ]);

    //     // Simpan CSV file dari request ke direktori sementara
    //     if ($request->hasFile('csv_file')) {
    //         $file = $request->file('csv_file');
    //         $path = $file->storeAs('temp', 'laporan.csv');

    //         // Jalankan script Python untuk melakukan analisis statistik
    //         $pythonScriptPath = public_path('python-scripts/statistika.py');
    //         $csvPath = storage_path('app/' . $path);
    //         $command = escapeshellcmd("python $pythonScriptPath $csvPath");
    //         $output = shell_exec($command);

    //         // Parse output JSON dari script Python
    //         $results = json_decode($output, true);

    //         // Periksa apakah $results tidak kosong
    //         if (empty($results)) {
    //             // Penanganan kasus ketika tidak ada hasil yang valid
    //             return redirect()->back()->with('error', 'Failed to generate statistics.');
    //         }

    //         // Ambil data laporans dari model Laporan
    //         $laporans = Laporan::all();

    //         // Untuk setiap laporan, ambil pertanyaan berdasarkan ID pertanyaan yang terkait
    //         foreach ($laporans as $laporan) {
    //             $id_pertanyaan_array = explode(',', $laporan->id_pertanyaan);
    //             $pertanyaans = Pertanyaan::whereIn('id_pertanyaan', $id_pertanyaan_array)->get();
    //             $laporan->pertanyaans = $pertanyaans;
    //         }

    //         // Kirim hasil analisis ke view hasilStatistika
    //         return view('admin.menus.hasilStatistika', compact('laporans', 'results'));
    //     } else {
    //         return redirect()->back()->with('error', 'No file uploaded.');
    //     }
    // }

    // public function generateStatistics_lihat()
    // {
    //     // Jalankan script Python untuk melakukan analisis statistik
    //     $pythonScriptPath = public_path('python-scripts/statistika.py');
    //     $command = escapeshellcmd("python $pythonScriptPath");
    //     $output = shell_exec($command);

    //     // Parse output JSON dari script Python
    //     $results = json_decode($output, true);

    //     // Periksa apakah $results tidak kosong
    //     if (empty($results)) {
    //         // Penanganan kasus ketika tidak ada hasil yang valid
    //         return redirect()->back()->with('error', 'Failed to generate statistics.');
    //     }

    //     // Ambil data laporans dari model Laporan
    //     $laporans = Laporan::all();

    //     // Untuk setiap laporan, ambil pertanyaan berdasarkan ID pertanyaan yang terkait
    //     foreach ($laporans as $laporan) {
    //         $id_pertanyaan_array = explode(',', $laporan->id_pertanyaan);
    //         $pertanyaans = Pertanyaan::whereIn('id_pertanyaan', $id_pertanyaan_array)->get();
    //         $laporan->pertanyaans = $pertanyaans;
    //     }

    //     // Kirim hasil analisis ke view hasilStatistika
    //     return view('admin.menus.hasilStatistika', compact('laporans', 'results'));
    // }

    // public function generateStatistics(Request $request)
    // {
    //     // Simpan CSV file dari request ke direktori sementara
    //     $file = $request->file('csv_file');
    //     $path = $file->storeAs('temp', 'data.csv');

    //     // Jalankan script Python
    //     $pythonScriptPath = public_path('python-scripts/statistika.py');
    //     $csvPath = storage_path('app/' . $path);
    //     $command = escapeshellcmd("python $pythonScriptPath $csvPath");
    //     $output = shell_exec($command);

    //     // Parse output JSON dari script Python
    //     $results = json_decode($output, true);

    //     // Periksa apakah $results tidak kosong
    //     if (empty($results)) {
    //         // Penanganan kasus ketika tidak ada hasil yang valid
    //         return redirect()->back()->with('error', 'Failed to generate statistics.');
    //     }

    //     // Kirim hasil analisis ke view
    //     return view('admin.menus.mLaporan', ['results' => $results]);
    // }
}
