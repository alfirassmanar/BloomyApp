@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Home</li>
                    <li class="breadcrumb-item"><a href="{{ route('mWisataTambah.bloomy') }}">Tambah Data</a></li>
                </ol>
            </nav>
            <div class="table-responsive">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">
                                {{-- <a href="{{ route('mWisataTambah.bloomy') }}">
                                    <button id="btnTambahData" class="btn btn-sm btn-primary">Tambah
                                        Data</button>
                                </a> --}}
                            </h5>
                            <div class="table-responsive">
                                <table id="wisataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Wisata</th>
                                            <th>Kategori</th>
                                            <th>Daftar</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data pengguna akan ditampilkan di sini menggunakan AJAX -->
                                    </tbody>
                                </table>
                                <nav id="paginationNav" aria-label="Page navigation">
                                    <!-- Pagination links akan diisi dengan AJAX -->
                                </nav>
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

{{-- Update/Edit --}}
<script>
    $(document).ready(function() {
        // Fungsi untuk memuat data wisata dan pagination
        function loadWisataData(page) {
            $.ajax({
                url: "{{ route('tampilWisata.admin.bloomy') }}?page=" + page,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        var wisataList = response.wisatas.data;
                        var html = '';

                        for (var i = 0; i < wisataList.length; i++) {
                            html += '<tr>';
                            html += '<td>' + (i + 1 + response.wisatas.from) + '</td>';
                            html += '<td>' + wisataList[i].nama_wisata + '</td>';
                            html += '<td>' + (wisataList[i].kategori ? wisataList[i].kategori
                                .kategori : 'Tidak Ada Kategori') + '</td>';
                            html += '<td>' + wisataList[i].tgl_input + '</td>';
                            html += '<td><img src="/storage/admin/fotoWisata/' + wisataList[i]
                                .foto_usaha + '" alt="Foto" width="100" height="100"></td>';
                            html += '<td>';
                            html += '<a href="/Dashboard/Admin/mWisata/Edit/' + wisataList[i]
                                .id_wisata +
                                '" class="btn btn-sm btn-outline-primary me-1">Edit</a>';
                            html += '<a href="/Dashboard/Admin/mWisata/Detail/' + wisataList[i]
                                .id_wisata +
                                '" class="btn btn-sm btn-outline-warning me-2">Detail</a>';
                            html += '<a href="/api/prosesHapusWisata/' + wisataList[i].id_wisata +
                                '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Anda yakin ingin menghapus wisata ini?\')">Hapus</a>';
                            html += '</td>';
                            html += '</tr>';
                        }

                        $('#wisataTable tbody').html(html);
                        $('#paginationNav').html(createPagination(response.wisatas));
                    } else {
                        console.error(response.message);
                        alert('Failed to fetch wisata.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while processing your request.');
                }
            });
        }

        // Memuat data wisata pada halaman pertama ketika halaman dimuat
        loadWisataData(1);

        // Meng-handle klik pada pagination
        $(document).on('click', '#paginationNav a', function(event) {
            event.preventDefault();
            var page = $(this).attr('data-page');
            loadWisataData(page);
        });

        // Fungsi untuk membuat navigasi pagination
        function createPagination(pagination) {
            var html = '';
            html += '<ul class="pagination justify-content-end">';
            if (pagination.prev_page_url) {
                html += '<li class="page-item"><a class="page-link" href="#" data-page="' + (pagination
                    .current_page - 1) + '">Previous</a></li>';
            } else {
                html += '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
            }
            for (var i = 1; i <= pagination.last_page; i++) {
                html += '<li class="page-item ' + (pagination.current_page === i ? 'active' : '') +
                    '"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
            }
            if (pagination.next_page_url) {
                html += '<li class="page-item"><a class="page-link" href="#" data-page="' + (pagination
                    .current_page + 1) + '">Next</a></li>';
            } else {
                html += '<li class="page-item disabled"><span class="page-link">Next</span></li>';
            }
            html += '</ul>';
            return html;
        }
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
