@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">
                <a href="{{ route('mUser.bloomy') }}">
                    <button class="btn btn-sm btn-danger">Kembali</button>
                </a>
            </h5>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('mUser.bloomy') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Admin</li>
                            </ol>
                        </nav>
                        <div class="card">
                            <div class="card-body">
                                <form id="editForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="{{ $data['userEdit']->username }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="hidden" class="form-control" id="password" name="password"
                                            disabled>
                                        <input type="password" class="form-control" id="new_password"
                                            name="new_password" placeholder="masukan password baru">
                                        <p>Password sebelumnya:
                                            <span id="password">{{ $data['userEdit']->password }}</span>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $data['userEdit']->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                            value="{{ $data['userEdit']->nama_lengkap }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_role" class="form-label">Role</label>
                                        <select class="form-control" id="id_role" name="id_role" required>
                                            <option value="">Pilih Role</option>
                                            @if ($data['userEdit']->role)
                                                <option value="{{ $data['userEdit']->id_role }}" selected>
                                                    {{ $data['userEdit']->role->nama_role }}
                                                </option>
                                            @endif
                                            <!-- Opsi lainnya akan diisi melalui Ajax -->
                                        </select>
                                        <p>Role sebelumnya:
                                            <span id="existing-role">
                                                @if ($data['userEdit']->role)
                                                    {{ $data['userEdit']->role->nama_role }}
                                                @else
                                                    Role tidak tersedia
                                                @endif
                                            </span>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Upload Foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto">
                                        <div id="foto-info" style="margin-top: 10px;">
                                            <p>File sebelumnya:
                                                <span id="existing-foto-name">{{ $data['userEdit']->foto }}</span>
                                            </p>
                                        </div>
                                        <img id="previewFoto"
                                            src="/storage/admin/fotoRegistrasi/{{ $data['userEdit']->foto }}"
                                            alt="Preview Foto" width="100"
                                            style="margin-top: 10px; display: {{ $data['userEdit']->foto ? 'block' : 'none' }};">
                                    </div>
                                    <input type="hidden" name="id_user" id="id_user"
                                        value="{{ $data['userEdit']->id_user }}" required>
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
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
            url: "{{ route('prosesEditUser.bloomy', $data['id_user']) }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var user = response.user;
                    $('#username').val(user.username);
                    $('#email').val(user.email);
                    $('#nama_lengkap').val(user.nama_lengkap);
                    $('#id_role').val(user.id_role).change();

                    if (user.foto) {
                        $('#previewFoto').attr('src', '/storage/admin/fotoRegistrasi/' + user.foto)
                            .show();
                        $('#existing-foto-name').text(user.foto);
                    }

                    var roles = response.roles;
                    var html = '';
                    roles.forEach(function(role) {
                        html += '<option value="' + role.id_role + '">' + role.nama_role +
                            '</option>';
                    });
                    $('#id_role').html(html);
                } else {
                    console.error(response.message);
                    alert('Gagal mengambil data user atau roles.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat mengambil data user atau roles.');
            }
        });

        $('#editForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            var newPassword = $('#new_password').val();
            if (newPassword) {
                formData.append('password', newPassword);
            }

            $.ajax({
                url: "{{ route('updateUser.bloomy', $data['id_user']) }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert('User berhasil diperbarui!');
                        window.location.href = "{{ route('mUser.bloomy') }}";
                    } else {
                        console.error(response.message);
                        if (response.errors && response.errors.password) {
                            alert('Password harus minimal 6 karakter.');
                        } else {
                            alert('Gagal memperbarui user.');
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    var errorMessage = "Terjadi kesalahan saat memproses permintaan Anda.";
                    if (xhr.status === 422) {
                        errorMessage =
                            "Terjadi kesalahan validasi. Password 6 Karakter.";
                    } else if (xhr.status === 500) {
                        errorMessage =
                            "Terjadi kesalahan internal server. Silakan coba lagi nanti.";
                    }
                    alert(errorMessage);
                }
            });

        });

        $('#foto').change(function() {
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

        $('#editForm').on('submit', function() {
            $('#password').prop('disabled', true);
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
