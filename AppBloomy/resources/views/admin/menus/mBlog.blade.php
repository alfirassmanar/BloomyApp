@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                {{-- <h5 class="card-title fw-semibold mb-4">Menu Admin-Blog / Artikel</h5> --}}
                <div class="row" id="kategoriContainer">
                    <!-- Data kategori akan ditampilkan di sini -->
                </div>
            </div>
        </div>

        <div class="card">
            <div class="table-responsive">
                <table id="blogTableWisata" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Nama Wisata</th>
                            <th>Nama Penulis</th>
                            <th>Input</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be dynamically inserted here using AJAX -->
                    </tbody>
                </table>
                <nav id="paginationNavWisata" aria-label="Page navigation">
                    <!-- Pagination links akan diisi dengan AJAX -->
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="table-responsive">
                <table id="blogTableUMKM" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Nama UMKM</th>
                            <th>Nama Penulis</th>
                            <th>Input</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be dynamically inserted here using AJAX -->
                    </tbody>
                </table>
                <nav id="paginationNavUMKM" aria-label="Page navigation">
                    <!-- Pagination links akan diisi dengan AJAX -->
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="table-responsive">
                <table id="blogTableKuliner" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Nama Kuliner</th>
                            <th>Nama Penulis</th>
                            <th>Input</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be dynamically inserted here using AJAX -->
                    </tbody>
                </table>
                <nav id="paginationNavKuliner" aria-label="Page navigation">
                    <!-- Pagination links akan diisi dengan AJAX -->
                </nav>
            </div>
        </div>
    </div>
</div>
@include('admin.theme.footer')
</div>
</div>
</div>


{{-- Tampil Blog Kategori --}}
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('tampilBlog.admin.bloomy') }}", // Ubah URL sesuai dengan route Anda
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var kategoriList = response.kategori;
                    var html = '';
                    for (var i = 0; i < kategoriList.length; i++) {
                        html += '<div class="col-md-4 mb-4">';
                        html += '<div class="card">';
                        html += '<div class="card-body">';
                        html += '<h5 class="card-title">' + kategoriList[i].kategori + '</h5>';
                        html +=
                            '<p class="card-text">Bloomy Sidoarjo Explore Menu Blog atau Artikel - Admin.</p>';
                        html +=
                            '<a href="{{ route('mBlogTambah.bloomy') }}" class="btn btn-outline-primary">Ketik Artikel</a>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }
                    $('#kategoriContainer').html(html);
                } else {
                    console.error(response.message);
                    alert('Failed to fetch kategori.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while processing your request.');
            }
        });
    });
</script>

{{-- Tampil Data Blog Wisata --}}
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('getWisataBlog.admin.bloomy') }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var blogs = response.blogs;
                    var html = '';

                    blogs.forEach(function(blog, index) {
                        html += '<tr>';
                        html += '<td>' + (index + 1) + '</td>';
                        html += '<td><img src="/storage/admin/fotoBlog/' + blog.foto_blog +
                            '" alt="Foto" width="70" height="70"></td>';
                        html += '<td>' + blog.wisata.nama_wisata + '</td>';
                        html += '<td>' + blog.nama_penulis + '</td>';
                        html += '<td>' + blog.tgl_input + '</td>';
                        html += '<td>';
                        html += '<a href="/Dashboard/Admin/mBlog/Edit/' + blog.id_blog +
                            '" class="btn btn-sm btn-outline-primary me-1">Edit</a>';
                        html += '<a href="/Dashboard/Admin/mBlog/Detail/' + blog.id_blog +
                            '" class="btn btn-sm btn-outline-warning me-2">Detail</a>';
                        html += '<a href="/api/prosesHapusBlog/' + blog.id_blog +
                            '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Anda yakin ingin menghapus blog ini?\')">Hapus</a>';
                        html += '</td>';
                        html += '</tr>';
                    });

                    $('#blogTableWisata tbody').html(html); // Memasukkan baris-baris ke dalam tabel
                } else {
                    console.error(response.message);
                    alert('Gagal mengambil data Wisata Blog.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat memproses permintaan.');
            }
        });
    });
</script>

{{-- Tampil Data Blog UMKM --}}
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('getUMKMBlog.admin.bloomy') }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var blogs = response.blogs;
                    var html = '';

                    blogs.forEach(function(blog, index) {
                        html += '<tr>';
                        html += '<td>' + (index + 1) + '</td>';
                        html += '<td><img src="/storage/admin/fotoBlog/' + blog.foto_blog +
                            '" alt="Foto" width="70" height="70"></td>';
                        html += '<td>' + blog.umkm.nama_umkm + '</td>';
                        html += '<td>' + blog.nama_penulis + '</td>';
                        html += '<td>' + blog.tgl_input + '</td>';
                        html += '<td>';
                        html += '<a href="/Dashboard/Admin/mBlog/Edit/' + blog.id_blog +
                            '" class="btn btn-sm btn-outline-primary me-1">Edit</a>';
                        html += '<a href="/Dashboard/Admin/mBlog/Detail/' + blog.id_blog +
                            '" class="btn btn-sm btn-outline-warning me-2">Detail</a>';
                        html += '<a href="/api/prosesHapusBlog/' + blog.id_blog +
                            '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Anda yakin ingin menghapus blog ini?\')">Hapus</a>';
                        html += '</td>';
                        html += '</tr>';
                    });

                    $('#blogTableUMKM tbody').html(html);
                } else {
                    console.error(response.message);
                    alert('Gagal mengambil data UMKM Blog.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat memproses permintaan.');
            }
        });
    });
</script>

{{-- Tampil Data Blog Kuliner --}}
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('getKulinerBlog.admin.bloomy') }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var blogs = response.blogs;
                    var html = '';

                    blogs.forEach(function(blog, index) {
                        html += '<tr>';
                        html += '<td>' + (index + 1) + '</td>';
                        html += '<td><img src="/storage/admin/fotoBlog/' + blog.foto_blog +
                            '" alt="Foto" width="70" height="70"></td>';
                        html += '<td>' + blog.kuliner.nama_kuliner + '</td>';
                        html += '<td>' + blog.nama_penulis + '</td>';
                        html += '<td>' + blog.tgl_input + '</td>';
                        html += '<td>';
                        html += '<a href="/Dashboard/Admin/mBlog/Edit/' + blog.id_blog +
                            '" class="btn btn-sm btn-outline-primary me-1">Edit</a>';
                        html += '<a href="/Dashboard/Admin/mBlog/Detail/' + blog.id_blog +
                            '" class="btn btn-sm btn-outline-warning me-2">Detail</a>';
                        html += '<a href="/api/prosesHapusBlog/' + blog.id_blog +
                            '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Anda yakin ingin menghapus blog ini?\')">Hapus</a>';
                        html += '</td>';
                        html += '</tr>';
                    });

                    $('#blogTableKuliner tbody').html(
                        html); // Memasukkan baris-baris ke dalam tabel
                } else {
                    console.error(response.message);
                    alert('Gagal mengambil data Kuliner Blog.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat memproses permintaan.');
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
