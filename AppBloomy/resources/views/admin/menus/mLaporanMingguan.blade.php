@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5>Wisata | Berhasil Registrasi</h5>
                    <span id="countWisata" onclick="">0</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5>UMKM | Berhasil Registrasi</h5>
                    <span id="countUMKM">0</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5>Kuliner | Berhasil Registrasi</h5>
                    <span id="countKuliner">0</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="laporan-DataTables" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Foto Usaha</th>
                                            <th>Nama Usaha</th>
                                            <th>Tanggal Usaha</th>
                                            <th>Lokasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data pengguna akan ditampilkan di sini menggunakan AJAX -->
                                    </tbody>
                                </table>
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
        $.ajax({
            url: "{{ route('tampilLaporanMingguan.admin.bloomy') }}",
            type: 'GET',
            success: function(response) {
                if (response && response.count !== undefined) {
                    $('#countWisata').text(response.count);
                    $('#countUMKM').text(response.countUMKM);
                    $('#countKuliner').text(response.countKuliner);
                } else {
                    console.error('Failed to fetch count data.');
                    alert('Failed to fetch data.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while processing your request.');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('tampilLaporanMingguan.admin.bloomy') }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var data = response.data;
                    var tbody = $('#laporan-DataTables tbody');

                    tbody.empty(); // Kosongkan tabel sebelum menambahkan data baru

                    data.forEach(function(item, index) {
                        var namaUsaha = '';
                        var fotoUsaha = '';

                        // Tentukan nama usaha dan path foto berdasarkan jenis data
                        if (item.nama_wisata) {
                            namaUsaha = item.nama_wisata;
                            fotoUsaha = '/storage/admin/fotoWisata/' + item.foto_usaha;
                        } else if (item.nama_umkm) {
                            namaUsaha = item.nama_umkm;
                            fotoUsaha = '/storage/admin/fotoUMKM/' + item.foto_usaha;
                        } else if (item.nama_kuliner) {
                            namaUsaha = item.nama_kuliner;
                            fotoUsaha = '/storage/admin/fotoKuliner/' + item.foto_usaha;
                        }

                        var row = '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td><img src="' + fotoUsaha +
                            '" alt="Foto Usaha" style="max-width: 100px; width: 100px; height: 100px;"></td>' +
                            '<td>' + namaUsaha + '</td>' +
                            '<td>' + item.tgl_input + '</td>' +
                            '<td>' + item.lokasi + '</td>' +
                            '</tr>';
                        tbody.append(row);
                    });

                    // Hapus inisialisasi DataTables jika sudah ada
                    if ($.fn.DataTable.isDataTable('#laporan-DataTables')) {
                        $('#laporan-DataTables').DataTable().destroy();
                    }

                    // Inisialisasi DataTables setelah data dimuat
                    $('#laporan-DataTables').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                } else {
                    console.error(response.message);
                    alert('Failed to fetch data.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while processing your request.');
            }
        });
    });
</script>


</body>

</html>
