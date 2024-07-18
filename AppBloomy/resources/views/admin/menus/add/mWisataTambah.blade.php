@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('mWisata.bloomy') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">
                            Wisata - Tambah Data
                        </h5>
                        <div class="card">
                            <div class="card-body">
                                <form id="addForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_wisata" class="form-label">Nama Wisata</label>
                                        <input type="text" class="form-control" id="nama_wisata" name="nama_wisata"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_kategori" class="form-label">Kategori</label>
                                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($kategori as $kategories)
                                                <option value="{{ $kategories->id_kategori }}">
                                                    {{ $kategories->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" id="keterangan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Upload Foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto_usaha"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_berdiri" class="form-label">Tanggal
                                            Berdiri</label>
                                        <input type="date" class="form-control" id="tgl_berdiri" name="tgl_berdiri"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_input" class="form-label">Tanggal Input ke
                                            Bloomy</label>
                                        <input type="date" class="form-control" id="tgl_input" name="tgl_input"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="generateChooseMaps" class="form-label">Cari Lokasi
                                            Wisata</label>
                                        <div class="mapouter">
                                            <div class="gmap_canvas">
                                                <iframe width="820" height="560" id="gmap_canvas"
                                                    id="iframeklikmaps"
                                                    src="https://maps.google.com/maps?q=Sidoarjo%2C+Jawa+Timur+Indonesia&t=&z=10&ie=UTF8&iwloc=&output=embed"
                                                    frameborder="0" scrolling="no" marginheight="0"
                                                    marginwidth="0"></iframe>
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
                                        <input type="text" class="form-control" id="generateChooseMaps"
                                            placeholder="Masukkan alamat atau nama lokasi" name="lokasi" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan
                                        Perubahan</button>
                                </form>
                                <div id="responseMessage" class="mt-3"></div>
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

{{-- Tambah Data --}}
<script>
    $(document).ready(function() {
        $('#addForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('prosesTambahWisata.bloomy') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    alert('Wisata berhasil ditambahkan!');
                    window.location.href = "{{ route('mWisata.bloomy') }}";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat menambahkan Wisata.');
                }
            });
        });
    });
</script>
{{-- Logout --}}
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
