@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('mPekerja.bloomy') }}">Home</a>
                    <li class="breadcrumb-item active">Tambah Data</li>
                    </li>
                </ol>
            </nav>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">
                            Pekerja - Tambah Data
                        </h5>
                        <div class="card">
                            <div class="card-body">
                                <form id="addForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id_user" class="form-label">Nama Pekerja</label>
                                        <select class="form-control" name="id_user">
                                            <option>Pilih Pekerja</option>
                                            @foreach ($data['getUser'] as $gtUser)
                                                <option value="{{ $gtUser->id_user }}"
                                                    {{ $data['pekerjaTambah']->id_user == $gtUser->id_user ? 'selected' : '' }}>
                                                    {{ $gtUser->nama_lengkap }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_wisata" class="form-label">Tour Guide</label>
                                        <select class="form-control" name="id_wisata">
                                            <option>Pilih Memandu Wisata</option>
                                            @foreach ($data['getWisata'] as $gtWisata)
                                                <option value="{{ $gtWisata->id_wisata }}"
                                                    {{ $data['pekerjaTambah']->id_wisata == $gtWisata->id_wisata ? 'selected' : '' }}>
                                                    {{ $gtWisata->nama_wisata }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat_pekerja" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat_pekerja"
                                            name="alamat_pekerja" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">Nomor Handphone</label>
                                        <input type="number" class="form-control" id="no_hp" name="no_hp"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="berkas" class="form-label">Berkas Pekerja</label>
                                        <input type="file" class="form-control" id="berkas" name="berkas"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="berkas" class="form-label">Upload Foto
                                            Formal</label>
                                        <input type="file" class="form-control" id="foto_pekerja" name="foto_pekerja"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                                        <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_keluar" class="form-label">Tanggal Keluar</label>
                                        <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar">
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                </form>
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
        $('#addForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('prosesTambahPekerja.bloomy') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    alert('Pekerja berhasil ditambahkan!');
                    window.location.href = "{{ route('mPekerja.bloomy') }}";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat menambahkan Pekerja: ' + xhr
                        .responseText);
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
