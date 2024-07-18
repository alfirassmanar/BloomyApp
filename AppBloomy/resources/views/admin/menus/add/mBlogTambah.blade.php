@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('mBlog.bloomy') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">
                            Blog - Tambah Data
                        </h5>
                        <div class="card">
                            <div class="card-body">
                                <form id="addForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id_kategori" class="form-label">Kategori</label>
                                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($data['kategori'] as $kategoriBlog)
                                                <option value="{{ $kategoriBlog->id_kategori }}">
                                                    {{ $kategoriBlog->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="id_wisata" class="form-label">Nama Wisata / UMKM /
                                            Kuliner</label>
                                        <select class="form-control" id="id_wisata" name="id_wisata" required>
                                            <option value="">Pilih Wisata / UMKM / Kuliner</option>
                                            <!-- Opsi akan diisi melalui AJAX -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_penulis" class="form-label">Nama Penulis</label>
                                        <input type="text" class="form-control" id="nama_penulis" name="nama_penulis"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="artikel" class="form-label">Artikel</label>
                                        <textarea class="form-control" id="artikel" name="artikel" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto_blog" class="form-label">Foto Blog</label>
                                        <input type="file" class="form-control" id="foto_blog" name="foto_blog"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_input" class="form-label">Tanggal Artikel</label>
                                        <input type="date" class="form-control" id="tgl_input" name="tgl_input"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan Artikel</button>
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

</div>
</div>
@include('admin.theme.footer')

{{-- Tambah Data --}}
<script>
    $(document).ready(function() {
        $('#id_kategori').on('change', function() {
            var id_kategori = $(this).val();

            $('#id_wisata').empty();
            $('#id_wisata').append('<option value="">Memuat...</option>');

            $.ajax({
                url: "{{ route('getUsahaKategori') }}",
                type: 'GET',
                data: {
                    id_kategori: id_kategori
                },
                success: function(response) {
                    $('#id_wisata').empty();

                    if (response.length > 0) {
                        $.each(response, function(key, value) {
                            $('#id_wisata').append('<option value="' + value.id +
                                '">' + value.nama + '</option>');
                        });
                    } else {
                        $('#id_wisata').append(
                            '<option value="">Tidak ada usaha tersedia untuk kategori ini</option>'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat memuat opsi wisata / UMKM / kuliner.');
                }
            });
        });

        // Handler untuk form submit
        $('#addForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('prosesTambahBlog.bloomy') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    alert('Artikel berhasil ditambahkan!');
                    window.location.href = "{{ route('mBlog.bloomy') }}";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat menambahkan artikel.');
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
