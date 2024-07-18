@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('mPelanggan.bloomy') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">
                            Pelanggan - Tambah Data
                        </h5>
                        <div class="card">
                            <div class="card-body">
                                <form id="addForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            required>
                                    </div>
                                    <!-- Hapus input password yang kosong -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" placeholder="Password 6 Karakter"
                                            id="password" name="password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_role" class="form-label">Role</label>
                                        <select class="form-control" id="id_role" name="id_role" required>
                                            <option value="">Pilih Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id_role }}"
                                                    {{ optional($data['userTambah']->role)->id_role == $role->id_role ? 'selected' : '' }}>
                                                    {{ $role->nama_role }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Upload Foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto"
                                            required>
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
                url: "{{ route('prosesTambahPelanggan.bloomy') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    alert('User berhasil ditambahkan!');
                    window.location.href = "{{ route('mPelanggan.bloomy') }}";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat menambahkan user.');
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
