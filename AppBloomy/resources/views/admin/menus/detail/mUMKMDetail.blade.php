@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('mUMKM.bloomy') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('mUMKMTambah.bloomy') }}">Tambah Data</a></li>
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
                            <h5 class="card-title fw-semibold">
                                {{ $data['umkm']->nama_umkm }}
                                {{-- <a href="{{ route('mUMKM.bloomy') }}">Kembali</a> --}}
                            </h5>
                            <label>
                                Sejak :
                                {{ \Carbon\Carbon::parse($data['umkm']->tgl_input)->format('d F Y') }}
                            </label>
                        </div>
                        <div>
                            <select class="form-select">
                                <?php use Carbon\Carbon; ?>
                                <option value="#">
                                    {{ \Carbon\Carbon::parse($data['umkm']->tgl_input)->format('d F Y') }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <img src="/storage/admin/fotoUMKM/{{ $data['umkm']->foto_usaha }}" alt="Foto" width="620"
                        height="650">
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5>{{ $data['umkm']->kategori->kategori }}</h5>
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <label class="fw-semibold">Deskripsi : </label>
                                    <p class="mb-0">{{ $data['umkm']->keterangan }}</p>
                                    <hr>
                                    <a
                                        href="https://maps.google.com/maps?q={{ urlencode($data['umkm']->lokasi) }}&t=&z=13&ie=UTF8&iwloc=&output=embed">
                                        {{ $data['umkm']->lokasi }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- Monthly Earnings -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row alig n-items-start">
                                    <div class="col-12">
                                        <iframe width="280" height="250" id="gmap_canvas" id="iframeklikmaps"
                                            src="https://maps.google.com/maps?q={{ urlencode($data['umkm']->lokasi) }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
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
