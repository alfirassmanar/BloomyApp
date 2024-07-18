@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Home</li>
                    <li class="breadcrumb-item"><a href="{{ route('mPekerjaTambah.bloomy') }}">Tambah Data</a></li>
                </ol>
            </nav>
            <div class="table-responsive">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">
                                {{-- <a href="{{ route('mPekerjaTambah.bloomy') }}">
                                    <button id="btnTambahData" class="btn btn-sm btn-primary">Tambah
                                        Data</button>
                                </a> --}}
                            </h5>
                            <div class="table-responsive">
                                <table id="pekerjaTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Foto</th>
                                            <th>Nama Pekerja</th>
                                            <th>Pemandu</th>
                                            <th>Role</th>
                                            <th>Masuk</th>
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
        loadPekerjaData(1);

        $(document).on('click', '#paginationNav a', function(event) {
            event.preventDefault();
            var page = $(this).data('page');
            loadPekerjaData(page);
        });

        function loadPekerjaData(page) {
            $.ajax({
                url: "{{ route('tampilPekerja.admin.bloomy') }}?page=" + page,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        var pekerja = response.pekerja.data;
                        var currentPage = response.pekerja.current_page;
                        var lastPage = response.pekerja.last_page;
                        var html = '';

                        for (var i = 0; i < pekerja.length; i++) {
                            html += '<tr>';
                            html += '<td>' + (response.pekerja.from + i) + '</td>';
                            html += '<td><img src="/storage/admin/fotoPekerja/' + pekerja[i]
                                .foto_pekerja +
                                '" alt="Foto" width="50" height="50"></td>';
                            html += '<td>' + pekerja[i].user.nama_lengkap + '</td>';
                            if (pekerja[i].wisata && pekerja[i].wisata.nama_wisata) {
                                html += '<td>' + pekerja[i].wisata.nama_wisata + '</td>';
                            } else {
                                html += '<td>No Wisata</td>';
                            }
                            if (pekerja[i].user.role && pekerja[i].user.role.nama_role) {
                                html += '<td>' + pekerja[i].user.role.nama_role + '</td>';
                            } else {
                                html += '<td>No Role</td>';
                            }
                            html += '<td>' + pekerja[i].tgl_masuk + '</td>';
                            html += '<td>';
                            html += '<a href="/Dashboard/Admin/mPekerja/Edit/' + pekerja[i]
                                .id_pekerja +
                                '" class="btn btn-sm btn-outline-primary me-1">Edit</a>';
                            html += '<a href="/api/prosesHapusPekerja/' + pekerja[i].id_pekerja +
                                '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Anda yakin ingin menghapus pekerja ini?\')">Hapus</a>';
                            html += '</td>';
                            html += '</tr>';
                        }

                        $('#pekerjaTable tbody').html(html);
                        createPagination(currentPage, lastPage);
                    } else {
                        console.error(response.message);
                        alert('Failed to fetch pekerja.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while processing your request.');
                }
            });
        }

        function createPagination(currentPage, lastPage) {
            var paginationHtml = '<ul class="pagination justify-content-end">';
            if (currentPage > 1) {
                paginationHtml += '<li class="page-item"><a class="page-link" href="#" data-page="' + (
                    currentPage - 1) + '">Previous</a></li>';
            } else {
                paginationHtml +=
                    '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>';
            }

            for (var i = 1; i <= lastPage; i++) {
                if (i == currentPage) {
                    paginationHtml += '<li class="page-item active"><a class="page-link" href="#" data-page="' +
                        i + '">' + i + '</a></li>';
                } else {
                    paginationHtml += '<li class="page-item"><a class="page-link" href="#" data-page="' + i +
                        '">' + i + '</a></li>';
                }
            }

            if (currentPage < lastPage) {
                paginationHtml += '<li class="page-item"><a class="page-link" href="#" data-page="' + (
                    currentPage + 1) + '">Next</a></li>';
            } else {
                paginationHtml += '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
            }
            paginationHtml += '</ul>';
            $('#paginationNav').html(paginationHtml);
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
