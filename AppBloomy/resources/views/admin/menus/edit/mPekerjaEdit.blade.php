@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('mPekerja.bloomy') }}">Home</a>
                    <li class="breadcrumb-item"><a href="{{ route('mPekerjaTambah.bloomy') }}">Tambah Data</a>
                    <li class="breadcrumb-item active">Edit Data</li>
                    </li>
                </ol>
            </nav>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">
                            Pekerja - Edit Data
                        </h5>
                        <div class="card">
                            <div class="card-body">
                                <form id="editForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id_user" class="form-label">Nama Pekerja</label>
                                        <select class="form-control" name="id_user">
                                            <option>Pilih Pekerja</option>
                                            @foreach ($data['getUser'] as $gtUser)
                                                <option value="{{ $gtUser->id_user }}"
                                                    {{ $data['pekerjaEdit']->id_user == $gtUser->id_user ? 'selected' : '' }}>
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
                                                    {{ $data['pekerjaEdit']->id_wisata == $gtWisata->id_wisata ? 'selected' : '' }}>
                                                    {{ $gtWisata->nama_wisata }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat_pekerja" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat_pekerja"
                                            name="alamat_pekerja" value="{{ $data['pekerjaEdit']->alamat_pekerja }}"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">Nomor Handphone</label>
                                        <input type="number" class="form-control" id="no_hp" name="no_hp"
                                            value="{{ $data['pekerjaEdit']->no_hp }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="berkas" class="form-label">Berkas Pekerja</label>
                                        <input type="file" class="form-control" id="berkas" name="berkas">
                                        <p>Berkas Sebelumnya: {{ $data['pekerjaEdit']->berkas }}</p>
                                        <iframe id="previewBerkas"
                                            src="/storage/admin/fotoPekerja/berkasPekerja/{{ $data['pekerjaEdit']->berkas }}"
                                            width="100%" height="200"
                                            style="display: {{ $data['pekerjaEdit']->berkas ? 'block' : 'none' }};"></iframe>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto_pekerja" class="form-label">Upload Foto</label>
                                        <input type="file" class="form-control" id="foto_pekerja"
                                            name="foto_pekerja">
                                        <div id="foto-info" style="margin-top: 10px;">
                                            <p>File sebelumnya: <span
                                                    id="existing-foto-name">{{ $data['pekerjaEdit']->foto_pekerja }}</span>
                                            </p>
                                        </div>
                                        <img id="previewFoto"
                                            src="/storage/admin/fotoPekerja/{{ $data['pekerjaEdit']->foto_pekerja }}"
                                            alt="Preview Foto" width="100"
                                            style="margin-top: 10px; display: {{ $data['pekerjaEdit']->foto_pekerja ? 'block' : 'none' }};">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                                        <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk"
                                            value="{{ $data['pekerjaEdit']->tgl_masuk }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_keluar" class="form-label">Tanggal Keluar</label>
                                        <input type="date" class="form-control" id="tgl_keluar"
                                            value="{{ $data['pekerjaEdit']->tgl_keluar }}" name="tgl_keluar">
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                </form>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('prosesEditPekerja.bloomy', $data['id_pekerja']) }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var pekerja = response.pekerjaEdit;
                    $('#id_user').val(pekerja.id_user);
                    $('#id_wisata').val(pekerja.id_wisata);
                    $('#alamat_pekerja').val(pekerja.alamat_pekerja);
                    $('#no_hp').val(pekerja.no_hp);
                    $('#tgl_masuk').val(pekerja.tgl_masuk);
                    $('#tgl_keluar').val(pekerja.tgl_keluar);

                    if (pekerja.foto_pekerja) {
                        $('#previewFoto').attr('src', '/storage/admin/fotoPekerja/' + pekerja
                            .foto_pekerja).show();
                        $('#existing-foto-name').text(pekerja.foto_pekerja);
                    }

                    if (pekerja.berkas) {
                        $('#previewBerkas').attr('src',
                                '/storage/admin/fotoPekerja/berkasPekerja/' +
                                pekerja.berkas)
                            .show();
                    }
                } else {
                    console.error(response.message);
                    alert('Gagal mengambil data pekerja.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat mengambil data pekerja.');
            }
        });

        $('#editForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('updatePekerja.bloomy', $data['id_pekerja']) }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert('Pekerja berhasil diperbarui!');
                        window.location.href = "{{ route('mPekerja.bloomy') }}";
                    } else {
                        console.error(response.message);
                        alert('Gagal memperbarui pekerja.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    var errorMessage = "Terjadi kesalahan saat memproses permintaan Anda.";
                    if (xhr.status === 422) {
                        errorMessage =
                            "Terjadi kesalahan validasi. Silakan cek input Anda.";
                    } else if (xhr.status === 500) {
                        errorMessage =
                            "Terjadi kesalahan internal server. Silakan coba lagi nanti.";
                    }
                    alert(errorMessage);
                }
            });
        });

        $('#foto_pekerja').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewFoto').attr('src', e.target.result).show();
                    $('#existing-foto-name').text(input.files[0].name);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        $('#berkas').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewBerkas').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
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
