@include('admin.theme.header')
@include('admin.theme.navProfile')

<style>
    .container-transaksi {
        display: flex;
        gap: 20px;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .card-transaksi {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 48%;
        /* Adjust to fit two cards in one line with some gap */
        transition: transform 0.3s;
        position: relative;
        /* Necessary for positioning child elements */
    }

    .card-transaksi:hover {
        transform: scale(1.05);
    }

    .card-image {
        position: relative;
        text-align: center;
        color: white;
    }

    .card-image img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .centered-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    h2 {
        margin-top: 0;
    }

    p {
        color: #555;
    }

    @media (max-width: 768px) {
        .card-transaksi {
            width: 100%;
            /* Full width on smaller screens */
        }
    }
</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <form id="addForm" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                    <select class="form-control" id="nama_pelanggan" name="id_user" required>
                                        <option value="" disabled selected>Pilih Pelanggan</option>
                                        <!-- Options will be populated by AJAX -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_pesanan" class="form-label">Jumlah Pesanan</label>
                                    <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan"
                                        placeholder="Pilih paket terlebih dahulu..." readonly required>
                                </div>
                                <div class="mb-3">
                                    <label for="total_bayar" class="form-label">Total Bayar</label>
                                    <input type="text" class="form-control" id="total_bayar" name="total_bayar"
                                        readonly>
                                </div>
                                <div class="container-transaksi">
                                    <div class="card-transaksi">
                                        <h4 style="text-align: center;">Pesanan</h4>
                                        <div class="mb-3">
                                            <label for="tgl_liburan" class="form-label">Tanggal Liburan</label>
                                            <input type="datetime-local" class="form-control" id="tgl_liburan"
                                                name="tgl_liburan" required readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tiket" class="form-label">Tiket</label>
                                            <input type="text" class="form-control" id="tiket" name="tiket"
                                                required readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="paket_wisata" class="form-label">Paket Wisata</label>
                                            <select class="form-control" id="paket_wisata" name="id_tour" required>
                                                <option value="" disabled selected>Pilih Paket</option>
                                                <!-- Options will be populated by AJAX -->
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary"
                                            style="width: 100%;">Konfirmasi</button>
                                    </div>
                                    <div class="card-transaksi">
                                        <img src="/assets/images/paket.jpeg"
                                            style="opacity: 0.5; width: 395px; height: 150px; margin-bottom: 10px;"
                                            alt="Card Image">
                                        <div class="centered-text" id="nama_tour" style="margin-top: -70px;">Paket 1
                                        </div>
                                        <p style="text-align: center;" id="detail_tour">Tour Guide, Lama Tour</p>
                                        <ul>
                                            <li>
                                                Jalur Wisata: <span id="jalur_wisata"></span>
                                            </li>
                                            <li>
                                                Tempat Penginapan: <span id="fasilitas_penginapan"></span>
                                            </li>
                                            <li>
                                                Konsumsi: <span id="fasilitas_konsumsi"></span>
                                            </li>
                                        </ul>
                                        <h4 style="text-align: center;">
                                            Rp. <span id="total_harga">300.000</span> / Orang
                                        </h4>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
<script src="/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/sidebarmenu.js"></script>
<script src="/assets/js/app.min.js"></script>
{{-- <script src="/assets/libs/apexcharts/dist/apexcharts.min.js"></script> --}}
<script src="/assets/libs/simplebar/dist/simplebar.js"></script>
{{-- <script src="/assets/js/dashboard.js"></script> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{-- Get Ajax --}}
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('tampilTransaksi.admin.bloomy') }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var paketWisata = response.users;
                    var html = '<option value="" disabled selected>Pilih Paket</option>';

                    for (var i = 0; i < paketWisata.length; i++) {
                        html += '<option value="' + paketWisata[i].id_tour + '">' + paketWisata[i]
                            .nama_tour + '</option>';
                    }

                    $('#paket_wisata').html(html);
                } else {
                    console.error(response.message);
                    alert('Failed to fetch Paket Wisata.');
                }
                if (response.success) {
                    var pelanggan = response.pelanggan;
                    var options = '<option value="" disabled selected>Pilih Pelanggan</option>';
                    for (var i = 0; i < pelanggan.length; i++) {
                        options += '<option value="' + pelanggan[i].id_user + '">' + pelanggan[i]
                            .nama_lengkap + '</option>';
                    }
                    $('#nama_pelanggan').html(options);
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

        // Change event for paket_wisata dropdown
        $('#paket_wisata').change(function() {
            var selectedId = $(this).val();
            if (selectedId) {
                $.ajax({
                    url: '{{ url('/getPaketWisataDetails') }}/' + selectedId,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            var paket = response.paket;
                            var namaWisataList = response.namaWisataList;

                            console.log(paket);

                            $('#nama_tour').text(paket.nama_tour);
                            $('#detail_tour').text(paket.pekerja.user.nama_lengkap + ', ' +
                                paket.lama_tour);

                            // Mengambil Data daftar nama wisata dari id_wisata array[]
                            var wisataNames = 'Data tidak tersedia';
                            if (namaWisataList.length > 0) {
                                wisataNames = namaWisataList.map(function(item) {
                                    return item.nama_wisata;
                                }).join(', ');
                            }
                            $('#jalur_wisata').text(wisataNames);

                            $('#fasilitas_penginapan').text(paket.fasilitas_penginapan ||
                                'Data tidak tersedia');
                            $('#fasilitas_konsumsi').text(paket.fasilitas_konsumsi ||
                                'Data tidak tersedia');
                            $('#total_harga').text(paket.total_harga ||
                                'Data tidak tersedia');

                            // Enable jumlah_pesanan input
                            $('#jumlah_pesanan').prop('readonly', false);
                        } else {
                            console.error(response.message);
                            alert('Failed to fetch Paket Wisata details.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred while processing your request.');
                    }
                });
            }
        });
    });
</script>

{{-- Total Bayar --}}
<script>
    $('#jumlah_pesanan').on('input', function() {
        var jumlahPesan = $(this).val();
        var totalHarga = parseFloat($('#total_harga').text().replace(/[^\d.-]/g,
            '')); // Remove non-numeric characters

        if (!isNaN(jumlahPesan) && !isNaN(totalHarga)) {
            var totalBayar = jumlahPesan * totalHarga;
            $('#total_bayar').val(totalBayar);
        } else {
            $('#total_bayar').val('');
        }
    });
</script>

{{-- Post Ajax --}}
<script>
    $('#addForm').submit(function(event) {
        event.preventDefault();

        var jumlah_pesanan = $('#jumlah_pesanan').val();
        var total_harga = parseFloat($('#total_harga').text().replace(/[^\d.-]/g,
            '')); // Remove non-numeric characters
        var total_bayar = jumlah_pesanan * total_harga;

        var formData = {
            id_user: $('#nama_pelanggan').val(),
            id_tour: $('#paket_wisata').val(),
            no_tiket: $('#tiket').val(),
            tgl_liburan: $('#tgl_liburan').val(),
            jumlah_pesanan: jumlah_pesanan,
            total_bayar: total_bayar,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: "{{ route('prosesTambahTransaksi.bloomy') }}",
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert('Transaksi berhasil ditambahkan');
                    // $('#addForm')[0].reset();
                    window.location.href = "{{ route('mTransaksi.bloomy') }}";
                } else {
                    console.error(response.message);
                    alert('Failed to add transaksi.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while processing your request.');
            }
        });
    });
</script>

{{-- Membuat Tanggal dan Nomor Otomatis --}}
<script>
    // Date Today
    document.addEventListener("DOMContentLoaded", function() {
        var today = new Date();
        var options = {
            timeZone: 'Asia/Jakarta',
            hour12: false
        };
        // var todayDateTimeJakarta = today.toLocaleString('sv-SE', options).replace(" ", "T");
        document.getElementById("tgl_liburan").value = "2024-06-21T10:30";
    });
    // Date + random number / text
    document.addEventListener("DOMContentLoaded", function() {
        function generateRandomLetters(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        function generateTicketNumber() {
            var today = new Date();
            var day = ("0" + today.getDate()).slice(-2);
            var month = ("0" + (today.getMonth() + 1)).slice(-2);
            var year = today.getFullYear();
            var datePart = year + month + day;

            // Generate a random number between 1000 and 9999
            var randomPart = Math.floor(1000 + Math.random() * 9000);

            // Generate a random sequence of 3 letters
            var lettersPart = generateRandomLetters(3);

            return datePart + randomPart + lettersPart;
        }

        var ticketNumber = generateTicketNumber();
        document.getElementById("tiket").value = ticketNumber;
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
