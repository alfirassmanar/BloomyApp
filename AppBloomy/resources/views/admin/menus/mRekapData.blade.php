@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <!-- Rekap Harian -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Rekap Harian</h2>
                </div>
                <div class="card-body">
                    <table id="rekapHarian" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Total Terdaftar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data Harian Akan Ditampilkan Di Sini -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Rekap Mingguan -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Rekap Mingguan</h2>
                </div>
                <div class="card-body">
                    <table id="rekapMingguan" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Total Terdaftar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data Mingguan Akan Ditampilkan Di Sini -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Rekap Bulanan -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Rekap Bulanan</h2>
                </div>
                <div class="card-body">
                    <table id="rekapBulanan" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Total Terdaftar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data Bulanan Akan Ditampilkan Di Sini -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Rekap Transaksi -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Rekap Transaksi</h2>
                </div>
                <div class="card-body">
                    <table id="rekapTransaksi" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Pelanggan</th>
                                <th>Tour Guide</th>
                                <th>Tiket</th>
                                <th>Jumlah</th>
                                <th>Total Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data Transaksi Akan Ditampilkan Di Sini -->
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Grafik Statistik -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Grafik Statistik</h2>
                </div>
                <div class="card-body">
                    <canvas id="chartContainer"></canvas>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Detail Transaksi -->
<div class="modal fade" id="modalDetailTransaksi" tabindex="-1" aria-labelledby="modalDetailTransaksiLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailTransaksiLabel">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nama Pelanggan:</strong> <span id="detailNamaPelanggan"></span>
                    </li>
                    <li class="list-group-item"><strong>Nama Tour:</strong> <span id="detailNamaTour"></span></li>
                    <li class="list-group-item"><strong>Nomor Tiket:</strong> <span id="detailNomorTiket"></span></li>
                    <li class="list-group-item"><strong>Jumlah Pesanan:</strong> <span id="detailJumlahPesanan"></span>
                    </li>
                    <li class="list-group-item"><strong>Total Bayar:</strong> <span id="detailTotalBayar"></span></li>
                    <li class="list-group-item"><strong>Total Bayar:</strong> <span id="detailTotalBayar"></span></li>
                    <li class="list-group-item"><strong>Alamat Tour Guide:</strong> <span
                            id="detailAlamatPekerja"></span>
                    </li>
                    <li class="list-group-item"><strong>Nama Wisata:</strong> <span id="detailNamaWisata"></span></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


@include('admin.theme.footer')
</div>
</div>

{{-- Script untuk diagram/chart --}}
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('tampilRekapData.admin.bloomy') }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    // Data rekap harian, mingguan, bulanan
                    var dataHarian = response.data.harian;
                    var dataMingguan = response.data.mingguan;
                    var dataBulanan = response.data.bulanan;

                    // Update data grafik
                    var ctx = document.getElementById('chartContainer').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['UMKM', 'Wisata', 'Kuliner'],
                            datasets: [{
                                label: 'Harian',
                                data: [
                                    dataHarian.umkm,
                                    dataHarian.wisata,
                                    dataHarian.kuliner
                                ],
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }, {
                                label: 'Mingguan',
                                data: [
                                    dataMingguan.umkm,
                                    dataMingguan.wisata,
                                    dataMingguan.kuliner
                                ],
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }, {
                                label: 'Bulanan',
                                data: [
                                    dataBulanan.umkm,
                                    dataBulanan.wisata,
                                    dataBulanan.kuliner
                                ],
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
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

{{-- Script untuk logika ajax --}}
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('tampilRekapData.admin.bloomy') }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var data = response.data;

                    var harianTbody = $('#rekapHarian tbody');
                    var mingguanTbody = $('#rekapMingguan tbody');
                    var bulananTbody = $('#rekapBulanan tbody');

                    harianTbody.empty();
                    mingguanTbody.empty();
                    bulananTbody.empty();

                    // Harian
                    harianTbody.append('<tr><td>UMKM</td><td>' + data.harian.umkm + '</td></tr>');
                    harianTbody.append('<tr><td>Wisata</td><td>' + data.harian.wisata +
                        '</td></tr>');
                    harianTbody.append('<tr><td>Kuliner</td><td>' + data.harian.kuliner +
                        '</td></tr>');

                    // Mingguan
                    mingguanTbody.append('<tr><td>UMKM</td><td>' + data.mingguan.umkm +
                        '</td></tr>');
                    mingguanTbody.append('<tr><td>Wisata</td><td>' + data.mingguan.wisata +
                        '</td></tr>');
                    mingguanTbody.append('<tr><td>Kuliner</td><td>' + data.mingguan.kuliner +
                        '</td></tr>');

                    // Bulanan
                    bulananTbody.append('<tr><td>UMKM</td><td>' + data.bulanan.umkm + '</td></tr>');
                    bulananTbody.append('<tr><td>Wisata</td><td>' + data.bulanan.wisata +
                        '</td></tr>');
                    bulananTbody.append('<tr><td>Kuliner</td><td>' + data.bulanan.kuliner +
                        '</td></tr>');

                    // Inisialisasi DataTables setelah data dimuat
                    $('#rekapHarian').DataTable({
                        dom: 'Bfrtip',
                        destroy: true,
                        buttons: [{
                                extend: 'copy',
                                title: 'Rekap Harian'
                            },
                            {
                                extend: 'csv',
                                title: 'Rekap Harian'
                            },
                            {
                                extend: 'excel',
                                title: 'Rekap Harian'
                            },
                            {
                                extend: 'pdf',
                                title: 'Rekap Harian',
                                customize: function(doc) {
                                    var now = new Date();
                                    var formattedDate = now.getDate() + '/' + (now
                                            .getMonth() + 1) + '/' + now
                                        .getFullYear() + ' ' + now.getHours() +
                                        ':' + now.getMinutes();
                                    doc.content[1].text =
                                        'Rekap Harian\n\nExported on: ' +
                                        formattedDate;
                                }
                            },
                            {
                                extend: 'print',
                                title: 'Rekap Harian',
                                customize: function(win) {
                                    var now = new Date();
                                    var formattedDate = now.getDate() + '/' + (now
                                            .getMonth() + 1) + '/' + now
                                        .getFullYear() + ' ' + now.getHours() +
                                        ':' + now.getMinutes();
                                    $(win.document.body).prepend(
                                        '<p>Exported on: ' + formattedDate +
                                        '</p>');
                                }
                            }
                        ]
                    });

                    $('#rekapMingguan').DataTable({
                        dom: 'Bfrtip',
                        destroy: true,
                        buttons: [{
                                extend: 'copy',
                                title: 'Rekap Mingguan'
                            },
                            {
                                extend: 'csv',
                                title: 'Rekap Mingguan'
                            },
                            {
                                extend: 'excel',
                                title: 'Rekap Mingguan'
                            },
                            {
                                extend: 'pdf',
                                title: 'Rekap Mingguan',
                                customize: function(doc) {
                                    var now = new Date();
                                    var formattedDate = now.getDate() + '/' + (now
                                            .getMonth() + 1) + '/' + now
                                        .getFullYear() + ' ' + now.getHours() +
                                        ':' + now.getMinutes();
                                    doc.content[1].text =
                                        'Rekap Mingguan\n\nExported on: ' +
                                        formattedDate;
                                }
                            },
                            {
                                extend: 'print',
                                title: 'Rekap Mingguan',
                                customize: function(win) {
                                    var now = new Date();
                                    var formattedDate = now.getDate() + '/' + (now
                                            .getMonth() + 1) + '/' + now
                                        .getFullYear() + ' ' + now.getHours() +
                                        ':' + now.getMinutes();
                                    $(win.document.body).prepend(
                                        '<p>Exported on: ' + formattedDate +
                                        '</p>');
                                }
                            }
                        ]
                    });

                    $('#rekapBulanan').DataTable({
                        dom: 'Bfrtip',
                        destroy: true,
                        buttons: [{
                                extend: 'copy',
                                title: 'Rekap Bulanan'
                            },
                            {
                                extend: 'csv',
                                title: 'Rekap Bulanan'
                            },
                            {
                                extend: 'excel',
                                title: 'Rekap Bulanan'
                            },
                            {
                                extend: 'pdf',
                                title: 'Rekap Bulanan',
                                customize: function(doc) {
                                    var now = new Date();
                                    var formattedDate = now.getDate() + '/' + (now
                                            .getMonth() + 1) + '/' + now
                                        .getFullYear() + ' ' + now.getHours() +
                                        ':' + now.getMinutes();
                                    doc.content[1].text =
                                        'Rekap Bulanan\n\nExported on: ' +
                                        formattedDate;
                                }
                            },
                            {
                                extend: 'print',
                                title: 'Rekap Bulanan',
                                customize: function(win) {
                                    var now = new Date();
                                    var formattedDate = now.getDate() + '/' + (now
                                            .getMonth() + 1) + '/' + now
                                        .getFullYear() + ' ' + now.getHours() +
                                        ':' + now.getMinutes();
                                    $(win.document.body).prepend(
                                        '<p>Exported on: ' + formattedDate +
                                        '</p>');
                                }
                            }
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

{{-- Script AJAX untuk Rekap Transaksi --}}
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('tampilRekapTransaksi.admin.bloomy') }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var dataTransaksi = response.data;
                    var tbody = $('#rekapTransaksi tbody');

                    tbody.empty(); // Kosongkan tabel sebelum menambahkan data baru

                    dataTransaksi.forEach(function(item) {
                        var row = '<tr>' +
                            '<td>' + item.user.nama_lengkap + '</td>' +
                            '<td><a href="#" class="detailTransaksi" data-id="' + item
                            .id_transaksi +
                            '" data-bs-toggle="modal" data-bs-target="#modalDetailTransaksi">' +
                            item.tour.nama_tour + '</a></td>' +
                            '<td>' + item.no_tiket + '</td>' +
                            '<td>' + item.jumlah_pesanan + '</td>' +
                            '<td>' + item.total_bayar + '</td>' +
                            '</tr>';
                        tbody.append(row);
                    });

                    // Inisialisasi DataTables setelah data dimuat
                    $('#rekapTransaksi').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });

                    // Event listener untuk klik pada tautan detail transaksi
                    $('#rekapTransaksi').on('click', '.detailTransaksi', function() {
                        var transaksiId = $(this).data('id');
                        var transaksi = dataTransaksi.find(function(item) {
                            return item.id_transaksi === transaksiId;
                        });

                        // Isi modal dengan detail transaksi
                        $('#detailNamaPelanggan').text(transaksi.user.nama_lengkap);
                        $('#detailNamaTour').text(transaksi.tour.nama_tour);
                        $('#detailNomorTiket').text(transaksi.no_tiket);
                        $('#detailJumlahPesanan').text(transaksi.jumlah_pesanan);
                        $('#detailTotalBayar').text(transaksi.total_bayar);
                        $('#detailAlamatPekerja').text(transaksi.tour.alamat_pekerja);
                        $('#detailNamaWisata').text(transaksi.tour.wisata_names.join(', '));
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
