@include('admin.theme.header')
@include('admin.theme.navProfile')

<style>
    .description-container {
        display: flex;
        align-items: flex-start;
        margin-bottom: 10px;
    }

    .label-description {
        font-weight: bold;
        width: 100px;
        margin-right: 10px;
    }

    .content-description {
        flex: 1;
        text-align: justify;
    }

    .card-body {
        position: relative;
        padding: 4px;
    }

    .image-container {
        position: relative;
        overflow: hidden;
    }

    .image-container img {
        display: block;
        width: 100%;
        height: auto;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.7);
        /* Ubah kebutuhan transparansi overlay */
        opacity: 0;
        /* Menghilangkan overlay saat awal */
        transition: opacity 0.3s ease;
    }

    .overlay:hover {
        opacity: 1;
        /* Menampilkan overlay saat digulirkan */
    }

    .overlay button {
        margin-top: 10px;
    }

    .description {
        position: relative;
        z-index: 1;
        background: rgba(255, 255, 255, 0.9);
        /* Background untuk teks */
        padding: 10px;
        margin-top: -50px;
        /* Menggeser deskripsi ke atas gambar */
        border-radius: 5px;
    }
</style>

<style>
    .mapouter {
        position: relative;
        text-align: right;
        height: 560px;
        width: 820px;
        margin-bottom: 20px;
    }
</style>
<style>
    .gmap_canvas {
        overflow: hidden;
        background: none !important;
        height: 560px;
        width: 820px;
    }
</style>

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('mBlog.bloomy') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('mBlogTambah.bloomy') }}">Tambah Data</a></li>
            <li class="breadcrumb-item active">Detail Data</li>
        </ol>
    </nav>
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <label>
                                Penulis :
                                {{ $data['blog']->nama_penulis }}
                            </label>
                        </div>
                        <div>
                            <select class="form-select">
                                <?php use Carbon\Carbon; ?>
                                <option value="#">
                                    {{ \Carbon\Carbon::parse($data['blog']->tgl_input)->format('d F Y') }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="description-container">
                        <div class="label-description">Artikel :</div>
                        <div class="content-description">
                            {{ $data['blog']->artikel }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4 position-relative">
                            <div class="image-container">
                                <img src="/storage/admin/fotoBlog/{{ $data['blog']->foto_blog }}" alt="Foto"
                                    class="img-fluid">
                                <div class="overlay">
                                    <button class="btn btn-sm btn-outline-warning">
                                        {{ $data['blog']->kategori->kategori }}
                                    </button>
                                </div>
                            </div>
                            <div class="description">
                                @if ($data['blog']->wisata)
                                    <p>{{ $data['blog']->wisata->nama_wisata }}</p>
                                @endif
                                @if ($data['blog']->umkm)
                                    <p>{{ $data['blog']->umkm->nama_umkm }}</p>
                                @endif
                                @if ($data['blog']->kuliner)
                                    <p>{{ $data['blog']->kuliner->nama_kuliner }}</p>
                                @endif
                            </div>
                            <a href="{{ route('mBlog.bloomy') }}">Kembali</a>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <!-- Monthly Earnings -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row alig n-items-start">
                                    <div class="col-12">
                                        @if ($data['lokasi'])
                                            <iframe width="280" height="250" id="gmap_canvas"
                                                src="https://maps.google.com/maps?q={{ urlencode($data['lokasi']) }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                            </iframe>
                                        @else
                                            <p>Lokasi tidak tersedia.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('admin.theme.footer')

</div>
</div>

<script>
    $(document).ready(function() {
        $('#logoutBtn').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('prosesLogout.admin.bloomy') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = "{{ route('login.admin.bloomy') }}";
                    } else {
                        alert('Failed to logout.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while processing your request.');
                }
            });
        });
    });
</script>
</body>

</html>
