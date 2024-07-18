@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('mWisata.bloomy') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('mWisataTambah.bloomy') }}">Tambah Data</a></li>
                    <li class="breadcrumb-item active">Edit Data</li>
                </ol>
            </nav>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">
                            Wisata - Edit Data
                        </h5>
                        <div class="card">
                            <div class="card-body">
                                <form id="editForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_wisata" class="form-label">Nama Wisata</label>
                                        <input type="text" class="form-control" id="nama_wisata" name="nama_wisata"
                                            value="{{ $data['wisata']->nama_wisata }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_kategori" class="form-label">Kategori</label>
                                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                                            <option value="{{ $data['wisata']->kategori->id_kategori }}">
                                                {{ $data['wisata']->kategori->kategori }}
                                            </option>
                                            @foreach ($kategori as $kategories)
                                                <option value="{{ $kategories->id_kategori }}">
                                                    {{ $kategories->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $data['wisata']->keterangan }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Upload Foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto_usaha">
                                        <div id="foto-info" style="margin-top: 10px;">
                                            <p>File sebelumnya: <span
                                                    id="existing-foto-name">{{ $data['wisata']->foto_usaha }}</span>
                                            </p>
                                        </div>
                                        <img id="previewFoto"
                                            src="/storage/admin/fotoWisata/{{ $data['wisata']->foto_usaha }}"
                                            alt="Preview Foto" width="100"
                                            style="margin-top: 10px; display: {{ $data['wisata']->foto_usaha ? 'block' : 'none' }};">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_berdiri" class="form-label">Tanggal
                                            Berdiri</label>
                                        <input type="date" class="form-control" id="tgl_berdiri" name="tgl_berdiri"
                                            value="{{ $data['wisata']->tgl_berdiri }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_input" class="form-label">Tanggal Input ke
                                            Bloomy</label>
                                        <input type="date" class="form-control" id="tgl_input" name="tgl_input"
                                            value="{{ $data['wisata']->tgl_input }}" required>
                                    </div>
                                    <div id="map" class="mb-3">
                                        <label for="map" class="form-label">Map</label>
                                        <div class="mapouter">
                                            <div class="gmap_canvas">
                                                <iframe width="820" height="560" id="gmap_canvas"
                                                    id="iframeklikmaps"
                                                    src="https://maps.google.com/maps?q={{ urlencode($data['wisata']->lokasi) }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                    frameborder="0" scrolling="no" marginheight="0"
                                                    marginwidth="0"></iframe>
                                                <style>
                                                    .mapouter {
                                                        position: relative;
                                                        text-align: right;
                                                        height: 560px;
                                                        width: 820px;
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
                                    <p>
                                        <span id="lokasi">{{ $data['wisata']->lokasi }}</span>
                                    </p>
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" name="lokasi" id="lokasi"
                                            value="{{ $data['wisata']->lokasi }}">
                                        <input type="text" class="form-control" name="lokasi"
                                            id="generateChooseMaps" placeholder="Paste alamat pilihan Anda disini">
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

        @include('admin.theme.footer')

    </div>
</div>

<script>
    var map;
    var geocoder;
    var marker;

    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // AJAX untuk mengambil data wisata
        $.ajax({
            url: "{{ route('prosesEditWisata.bloomy', $data['wisata']->id_wisata) }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var wisata = response.wisata;

                    // Mengisi form dengan data dari database
                    $('#nama_wisata').val(wisata.nama_wisata);
                    $('#id_kategori').val(wisata.id_kategori);
                    $('#keterangan').val(wisata.keterangan);
                    $('#tgl_berdiri').val(wisata.tgl_berdiri);
                    $('#tgl_input').val(wisata.tgl_input);

                    // Menampilkan foto jika ada
                    if (wisata.foto_usaha) {
                        $('#previewFoto').attr('src', '/storage/admin/fotoWisata/' + wisata
                            .foto_usaha).show();
                        $('#existing-foto-name').text(wisata.foto_usaha);
                    }

                    // Menampilkan peta dengan lokasi dari database
                    var address = wisata.lokasi;
                    geocodeAddress(address);
                } else {
                    console.error(response.message);
                    alert('Gagal mengambil data wisata.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat mengambil data wisata.');
            }
        });

        // Menyimpan nilai lokasi sebelumnya
        var lokasiSebelumnya = $('#lokasi').text().trim();

        // Mengembalikan nilai lokasi jika input kosong
        $('#generateChooseMaps').on('focusout', function() {
            if ($(this).val().trim() === '') {
                $(this).val(lokasiSebelumnya);
            }
        });

        // AJAX untuk mengupdate data wisata
        $('#editForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('updateWisata.bloomy', $data['wisata']->id_wisata) }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert('Wisata berhasil diperbarui!');
                        window.location.href = "{{ route('mWisata.bloomy') }}";
                    } else {
                        console.error(response.message);
                        alert('Gagal memperbarui wisata.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    var errorMessage = "Terjadi kesalahan saat memproses permintaan Anda.";
                    if (xhr.status === 422) {
                        errorMessage = "Terjadi kesalahan validasi.";
                    } else if (xhr.status === 500) {
                        errorMessage =
                            "Terjadi kesalahan internal server. Silakan coba lagi nanti.";
                    }
                    alert(errorMessage);
                }
            });
        });

        // Event listener saat memilih file foto
        $('#foto').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewFoto').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        // Menonaktifkan field password saat form disubmit
        $('#editForm').on('submit', function() {
            $('#password').prop('disabled', true);
        });
    });

    // Fungsi untuk menampilkan peta berdasarkan alamat
    function geocodeAddress(address) {
        geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status === 'OK') {
                var mapOptions = {
                    zoom: 13,
                    center: results[0].geometry.location
                }
                map = new google.maps.Map(document.getElementById('gmap_canvas'), mapOptions);
                marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    draggable: true // Tambahkan opsi draggable jika diperlukan
                });
            } else {
                console.error('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>
</body>

</html>
