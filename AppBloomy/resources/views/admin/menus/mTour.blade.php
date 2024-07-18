@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Home</li>
                    <li class="breadcrumb-item"><a href="{{ route('mTourTambah.bloomy') }}">Tambah Data</a></li>
                </ol>
            </nav>
            <div class="table-responsive">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">
                                {{-- <a href="{{ route('mTourTambah.bloomy') }}">
                                    <button id="btnTambahData" class="btn btn-sm btn-primary">Tambah
                                        Data</button>
                                </a> --}}
                            </h5>
                            <div class="table-responsive">
                                <table id="userTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Paket</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
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

{{-- Tampil --}}
<script>
    $(document).ready(function() {
        loadTourData(1);

        $(document).on('click', '#paginationNav a', function(event) {
            event.preventDefault();
            var page = $(this).data('page');
            loadTourData(page);
        });

        function loadTourData(page) {
            $.ajax({
                url: "{{ route('tampilTour.admin.bloomy') }}?page=" + page,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        var tour = response.tour.data;
                        var pagination = response.tour;
                        var html = '';

                        for (var i = 0; i < tour.length; i++) {
                            html += '<tr>';
                            html += '<td>' + (pagination.from + i) + '</td>';
                            html += '<td>' + tour[i].nama_tour + '</td>';
                            html += '<td>' + tour[i].tgl_mulai + '</td>';
                            html += '<td>' + tour[i].tgl_selesai + '</td>';
                            html += '<td>';
                            html += '<a href="/Dashboard/Admin/mTour/Detail/' + tour[i].id_tour +
                                '" class="btn btn-sm btn-outline-warning me-1">Detail</a>';
                            html += '<a href="/Dashboard/Admin/mTour/Edit/' + tour[i].id_tour +
                                '" class="btn btn-sm btn-outline-primary me-1">Edit</a>';
                            html += '<a href="/api/prosesHapusTour/' + tour[i].id_tour +
                                '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Anda yakin ingin menghapus tour ini?\')">Hapus</a>';
                            html += '</td>';
                            html += '</tr>';
                        }

                        $('#userTable tbody').html(html);
                        createPagination(pagination);
                    } else {
                        console.error(response.message);
                        alert('Failed to fetch tour.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while processing your request.');
                }
            });
        }

        function createPagination(pagination) {
            var paginationHtml = '<ul class="pagination justify-content-end">';

            if (pagination.current_page > 1) {
                paginationHtml += '<li class="page-item"><a class="page-link" href="#" data-page="' + (
                    pagination.current_page - 1) + '">Previous</a></li>';
            } else {
                paginationHtml +=
                    '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>';
            }

            for (var i = 1; i <= pagination.last_page; i++) {
                if (i == pagination.current_page) {
                    paginationHtml += '<li class="page-item active"><a class="page-link" href="#" data-page="' +
                        i + '">' + i + '</a></li>';
                } else {
                    paginationHtml += '<li class="page-item"><a class="page-link" href="#" data-page="' + i +
                        '">' + i + '</a></li>';
                }
            }

            if (pagination.current_page < pagination.last_page) {
                paginationHtml += '<li class="page-item"><a class="page-link" href="#" data-page="' + (
                    pagination.current_page + 1) + '">Next</a></li>';
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
