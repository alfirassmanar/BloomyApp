@include('admin.theme.header')
@include('admin.theme.navProfile')

<style>
    .preview-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        display: block;
    }
</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('mBlog.bloomy') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('mBlogTambah.bloomy') }}">Tambah Data</a></li>
                    <li class="breadcrumb-item active">Edit Data</li>
                </ol>
            </nav>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">
                            Blog - Edit Data
                        </h5>
                        <div class="card">
                            <div class="card-body">
                                <form id="editForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id_kategori" class="form-label">Nama Kategori</label>
                                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                                            <option value="{{ $data['blog']->id_kategori }}">
                                                {{ $data['blog']->kategori->kategori }}</option>
                                            @foreach ($kategoriList as $kategori)
                                                <option value="{{ $kategori->id_kategori }}">
                                                    {{ $kategori->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3" id="wisata-container" style="display: none;">
                                        <label for="id_wisata" class="form-label">Nama Wisata</label>
                                        <select class="form-control" id="id_wisata" name="id_wisata">
                                            <!-- Options will be populated by JavaScript -->
                                        </select>
                                    </div>
                                    <div class="mb-3" id="umkm-container" style="display: none;">
                                        <label for="id_umkm" class="form-label">Nama UMKM</label>
                                        <select class="form-control" id="id_umkm" name="id_umkm">
                                            <!-- Options will be populated by JavaScript -->
                                        </select>
                                    </div>
                                    <div class="mb-3" id="kuliner-container" style="display: none;">
                                        <label for="id_kuliner" class="form-label">Nama Kuliner</label>
                                        <select class="form-control" id="id_kuliner" name="id_kuliner">
                                            <!-- Options will be populated by JavaScript -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_penulis" class="form-label">Nama Penulis</label>
                                        <input type="text" class="form-control" id="nama_penulis" name="nama_penulis"
                                            value="{{ $data['blog']->nama_penulis }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="artikel" class="form-label">Artikel / Blog</label>
                                        <textarea class="form-control" id="artikel" name="artikel" required>{{ $data['blog']->artikel }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto_blog" class="form-label">Upload Foto</label>
                                        <input type="file" class="form-control" id="foto_blog" name="foto_blog">
                                        <div id="foto-info" style="margin-top: 10px;">
                                            <p>File sebelumnya:</p>
                                            <img id="previewFoto"
                                                src="/storage/admin/fotoBlog/{{ $data['blog']->foto_blog }}"
                                                alt="Preview Foto" class="preview-img"
                                                style="display: {{ $data['blog']->foto_blog ? 'block' : 'none' }};">
                                            <div id="newFotoPreviewContainer" style="margin-top: 10px; display: none;">
                                                <p>File baru:</p>
                                                <img id="newPreviewFoto" src="" alt="New Preview Foto"
                                                    class="preview-img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_input" class="form-label">Tanggal Input</label>
                                        <input type="date" class="form-control" id="tgl_input" name="tgl_input"
                                            value="{{ $data['blog']->tgl_input }}" required>
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
    $(document).ready(function() {
        function updateDropdownVisibility() {
            var id_kategori = $('#id_kategori').val();

            // Hide all containers by default
            $('#wisata-container').hide();
            $('#umkm-container').hide();
            $('#kuliner-container').hide();

            // Show the container based on selected category
            if (id_kategori == 1) { // Adjust the condition based on your category ID logic
                $('#wisata-container').show();
            } else if (id_kategori == 2) { // Adjust the condition based on your category ID logic
                $('#umkm-container').show();
            } else if (id_kategori == 3) { // Adjust the condition based on your category ID logic
                $('#kuliner-container').show();
            }
        }

        $('#id_kategori').change(function() {
            var id_kategori = $(this).val();

            $.ajax({
                url: "/api/getDataByKategori/" + id_kategori,
                type: 'GET',
                success: function(response) {
                    $('#id_wisata').empty();
                    $.each(response.wisata, function(key, value) {
                        $('#id_wisata').append('<option value="' + value.id_wisata +
                            '">' + value.nama_wisata + '</option>');
                    });

                    $('#id_umkm').empty();
                    $.each(response.umkm, function(key, value) {
                        $('#id_umkm').append('<option value="' + value.id_umkm +
                            '">' + value.nama_umkm + '</option>');
                    });

                    $('#id_kuliner').empty();
                    $.each(response.kuliner, function(key, value) {
                        $('#id_kuliner').append('<option value="' + value
                            .id_kuliner +
                            '">' + value.nama_kuliner + '</option>');
                    });

                    updateDropdownVisibility();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Gagal mengambil data sesuai kategori.');
                }
            });
        });

        $('#id_kategori').trigger('change');

        // Update form with existing blog data
        $.ajax({
            url: "{{ route('prosesEditBlogBlog.bloomy', $data['blog']->id_blog) }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var blog = response.blog;

                    // Set the existing values
                    $('#nama_penulis').val(blog.nama_penulis);
                    $('#artikel').val(blog.artikel);
                    $('#tgl_input').val(blog.tgl_input);
                    if (blog.foto_blog) {
                        $('#previewFoto').attr('src', '/storage/admin/fotoBlog/' + blog.foto_blog)
                            .show();
                        $('#newFotoPreviewContainer').show();
                        $('#existing-foto-name').text(blog.foto_blog);
                    }

                    // Set the existing category and trigger change to load appropriate dropdown options
                    $('#id_kategori').val(blog.id_kategori).trigger('change');

                    // Pre-select the existing subcategory values
                    setTimeout(function() {
                        $('#id_wisata').val(blog.id_wisata);
                        $('#id_umkm').val(blog.id_umkm);
                        $('#id_kuliner').val(blog.id_kuliner);
                    }, 500);
                } else {
                    console.error(response.message);
                    alert('Gagal mengambil data blog.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat mengambil data blog.');
            }
        });

        $('#editForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('updateBlogBlog.bloomy', $data['blog']->id_blog) }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert('Blog berhasil diperbarui!');
                        window.location.href = "{{ route('mBlog.bloomy') }}";
                    } else {
                        console.error(response.message);
                        alert('Gagal memperbarui blog.');
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
        $('#foto_blog').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#newPreviewFoto').attr('src', e.target.result).show();
                    $('#newFotoPreviewContainer').show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        $('#editForm').on('submit', function() {
            $('#password').prop('disabled', true);
        });
    });
</script>

</body>

</html>
