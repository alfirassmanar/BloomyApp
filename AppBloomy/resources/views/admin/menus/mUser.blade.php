@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Home</li>
                    <li class="breadcrumb-item"><a href="{{ route('mUserTambah.bloomy') }}">Tambah Data</a></li>
                </ol>
            </nav>
            <div class="table-responsive">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h5 class="card-title fw-semibold mb-4">
                                <a href="{{ route('mUserTambah.bloomy') }}">
                                    <button id="btnTambahData" class="btn btn-sm btn-primary">Tambah
                                        Data</button>
                                </a>
                            </h5> --}}
                            <div class="table-responsive">
                                <table id="userTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Foto</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Role</th>
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
        loadUsers(1); // Load page 1 on initial load

        function loadUsers(page) {
            $.ajax({
                url: "{{ route('tampilUser.admin.bloomy') }}?page=" + page,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        var users = response.users.data;
                        var html = '';
                        for (var i = 0; i < users.length; i++) {
                            html += '<tr>';
                            html += '<td>' + (i + 1) + '</td>';
                            html += '<td><img src="/storage/admin/fotoRegistrasi/' + users[i].foto +
                                '" alt="Foto" width="50" height="50"></td>';
                            html += '<td>' + users[i].nama_lengkap + '</td>';
                            html += '<td>' + users[i].email + '</td>';
                            if (users[i].role && users[i].role.nama_role) {
                                html += '<td>' + users[i].role.nama_role + '</td>';
                            } else {
                                html += '<td>No Role</td>';
                            }
                            html += '<td>';
                            html += '<a href="/Dashboard/Admin/mUser/Edit/' + users[i].id_user +
                                '" class="btn btn-sm btn-outline-primary me-1">Edit</a>';
                            html += '<a href="/api/prosesHapusUser/' + users[i].id_user +
                                '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Anda yakin ingin menghapus user ini?\')">Hapus</a>';
                            html += '</td>';
                            html += '</tr>';
                        }
                        $('#userTable tbody').html(html);

                        // Update pagination links
                        updatePagination(response.users);
                    } else {
                        console.error(response.message);
                        alert('Failed to fetch users.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while processing your request.');
                }
            });
        }

        function updatePagination(data) {
            var paginationNav = $('#paginationNav');
            paginationNav.empty();
            var prevClass = data.prev_page_url ? '' : 'disabled';
            var nextClass = data.next_page_url ? '' : 'disabled';

            var paginationHtml = '<ul class="pagination justify-content-end">';
            paginationHtml += '<li class="page-item ' + prevClass +
                '"><a class="page-link" href="#" data-page="' + (data.current_page - 1) + '">Previous</a></li>';

            for (var i = 1; i <= data.last_page; i++) {
                var activeClass = data.current_page == i ? 'active' : '';
                paginationHtml += '<li class="page-item ' + activeClass +
                    '"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
            }

            paginationHtml += '<li class="page-item ' + nextClass +
                '"><a class="page-link" href="#" data-page="' + (data.current_page + 1) + '">Next</a></li>';
            paginationHtml += '</ul>';

            paginationNav.append(paginationHtml);
        }

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).data('page');
            loadUsers(page);
        });
    });

    function exportToCSV() {
        $.ajax({
            url: "{{ route('tampilUser.admin.bloomy') }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var users = response.users;
                    var csvContent = [];
                    var header = ["#", "Foto", "Nama Lengkap", "Email", "Role"];
                    csvContent.push(header.join(','));

                    for (var i = 0; i < users.length; i++) {
                        var row = [];
                        row.push(i + 1);
                        row.push('/storage/admin/fotoRegistrasi/' + users[i].foto);
                        row.push(users[i].nama_lengkap);
                        row.push(users[i].email);
                        row.push(users[i].role && users[i].role.nama_role ? users[i].role.nama_role :
                            'No Role');
                        csvContent.push(row.join(','));
                    }

                    var csvData = csvContent.join('\n');
                    var link = document.createElement('a');
                    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csvData));
                    link.setAttribute('download', 'users.csv');
                    link.style.display = 'none';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                } else {
                    console.error(response.message);
                    alert('Failed to fetch users.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while processing your request.');
            }
        });
    }
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
