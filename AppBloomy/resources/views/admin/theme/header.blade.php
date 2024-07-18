<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $data['title'] }}</title>
    <link rel="icon" type="image/png" href="/assets/Clarion.jpeg">
    <link rel="stylesheet" href="/assets/css/styles.min.css" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
</head>

<style>
    .sidebar-submenu-item {
        padding-left: 20px;
    }
</style>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('dashboard.bloomy') }}" class="text-nowrap logo-img">
                        <h2
                            style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                            <img src="/assets/bloomy.png" alt="Logo" width="220">
                        </h2>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('dashboard.bloomy') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Menus</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('mUser.bloomy') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-headset"></i>
                                </span>
                                <span class="hide-menu">Admin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('mPelanggan.bloomy') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">Pelanggan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('mPekerja.bloomy') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-friends"></i>
                                </span>
                                <span class="hide-menu">Tour Guide</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('mTour.bloomy') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-box"></i>
                                </span>
                                <span class="hide-menu">Tour Paket</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('mWisata.bloomy') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-luggage"></i>
                                </span>
                                <span class="hide-menu">Wisata</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('mUMKM.bloomy') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user-check"></i>
                                </span>
                                <span class="hide-menu">UMKM</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('mKuliner.bloomy') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-tools-kitchen-2"></i>
                                </span>
                                <span class="hide-menu">Kuliner</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('mBlog.bloomy') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-typography"></i>
                                </span>
                                <span class="hide-menu">Blog / Artikel</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Report / Transaksi</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('mTransaksi.bloomy') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-businessplan"></i>
                                </span>
                                <span class="hide-menu">Transaksi</span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('mLaporan.bloomy') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-report"></i>
                                </span>
                                <span class="hide-menu">Laporan</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span>
                                    <i class="ti ti-report"></i>
                                </span>
                                <span class="hide-menu">Laporan</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item sidebar-submenu-item">
                                    <a href="{{ route('mLaporanMingguan.bloomy') }}" class="sidebar-link">
                                        <span>
                                            <i class="ti ti-flag"></i>
                                        </span>
                                        <span class="hide-menu">Laporan Mingguan</span>
                                    </a>
                                </li>
                                <li class="sidebar-item sidebar-submenu-item">
                                    <a href="{{ route('mLaporanBulanan.bloomy') }}" class="sidebar-link">
                                        <span>
                                            <i class="ti ti-flag"></i>
                                        </span>
                                        <span class="hide-menu">Laporan Bulanan</span>
                                    </a>
                                </li>
                                <li class="sidebar-item sidebar-submenu-item">
                                    <a href="#" class="sidebar-link">
                                        <span>
                                            <i class="ti ti-flag"></i>
                                        </span>
                                        <span class="hide-menu">Laporan Per Kategori</span>
                                    </a>
                                    <!-- Submenu -->
                                    <ul class="collapse second-level">
                                        <li class="sidebar-submenu-item">
                                            <a href="{{ route('mLaporan.Kategori.Wisata.bloomy') }}"
                                                class="sidebar-link">
                                                <span>
                                                    <i class="ti ti-flag"></i>
                                                </span>
                                                <span>Lap-Wisata</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-submenu-item">
                                            <a href="{{ route('mLaporan.Kategori.Wisata.bloomy') }}"
                                                class="sidebar-link">
                                                <span>
                                                    <i class="ti ti-flag"></i>
                                                </span>
                                                <span>Lap-UMKM</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-submenu-item">
                                            <a href="{{ route('mLaporan.Kategori.Wisata.bloomy') }}"
                                                class="sidebar-link">
                                                <span>
                                                    <i class="ti ti-flag"></i>
                                                </span>
                                                <span>Lap-Kuliner</span>
                                            </a>
                                        </li>
                                        <!-- Tambahkan submenu lainnya sesuai kebutuhan -->
                                    </ul>
                                </li>
                                <li class="sidebar-item sidebar-submenu-item">
                                    <a href="{{ route('mRekapData.bloomy') }}" class="sidebar-link">
                                        <span>
                                            <i class="ti ti-flag"></i>
                                        </span>
                                        <span class="hide-menu">Rekap Data</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">EXTRA</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('mKalkulasi.bloomy') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-chart-infographic"></i>
                                </span>
                                <span class="hide-menu">Kalkulasi</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            {{-- @include('admin.theme.navProfile') --}}
            <!--  Header End -->
