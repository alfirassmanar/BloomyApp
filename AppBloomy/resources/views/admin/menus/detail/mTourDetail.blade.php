@include('admin.theme.header')
@include('admin.theme.navProfile')

<style>
    /* CSS untuk Invoice Container */
    .invoice-container {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    /* CSS untuk Invoice Header */
    .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .invoice-header h4 {
        margin: 0;
        color: #333333;
        font-size: 1.5rem;
    }

    .invoice-header a.btn {
        color: #ffffff;
        text-decoration: none;
    }

    .invoice-header a.btn:hover {
        color: #ffffff;
        text-decoration: none;
    }

    .invoice-header a.btn.btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .invoice-header a.btn.btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    /* CSS untuk Detail Invoice */
    .invoice-details {
        display: flex;
        justify-content: space-between;
    }

    .invoice-details>div {
        width: 48%;
    }

    .invoice-details p {
        margin: 5px 0;
        color: #666666;
    }

    .invoice-details ul {
        list-style-type: none;
        padding: 0;
    }

    .invoice-details ul li {
        margin-bottom: 5px;
    }

    /* CSS untuk Tabel Item Invoice */
    .invoice-items table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .invoice-items th,
    .invoice-items td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    .invoice-items th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    /* CSS untuk Total Amount */
    .total-amount {
        margin-top: 20px;
        padding: 10px;
        background-color: #f2f2f2;
        border-radius: 8px;
        text-align: right;
    }

    .total-amount p {
        margin: 5px 0;
        font-weight: bold;
    }

    /* CSS untuk Footer */
    .footer-text {
        margin-top: 20px;
        text-align: center;
        color: #666666;
        font-size: 0.9rem;
    }

    .invoice-footer {
        margin-top: 20px;
        padding-top: 10px;
        border-top: 1px solid #e0e0e0;
        text-align: right;
    }

    .invoice-footer a.btn {
        color: #ffffff;
        text-decoration: none;
    }

    .invoice-footer a.btn:hover {
        color: #ffffff;
        text-decoration: none;
    }

    .invoice-footer a.btn.btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .invoice-footer a.btn.btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }
</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('mTour.bloomy') }}">Home</a></li>
                    <li class="breadcrumb-item active">Detail Tour</li>
                </ol>
            </nav>
            <div class="table-responsive">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <form action="">
                                <div class="invoice-container">
                                    <div class="invoice-header">
                                        <h4>Invoice Tour</h4>
                                        {{-- <a href="{{ route('mTour.bloomy') }}" class="btn btn-sm btn-danger">Kembali</a> --}}
                                    </div>
                                    <div class="invoice-details">
                                        <div>
                                            <p><strong>Nama Tour:</strong>
                                                {{ $data['tourTampil']->nama_tour }}</p>
                                            <p><strong>Tour Guide:</strong>
                                                {{ $data['tourTampil']->pekerja->user->nama_lengkap }}</p>
                                            <p><strong>Tanggal Mulai:</strong>
                                                {{ $data['tourTampil']->tgl_mulai }}</p>
                                            <p><strong>Tanggal Selesai:</strong>
                                                {{ $data['tourTampil']->tgl_selesai }}</p>
                                            <p><strong>Fasilitas Penginapan:</strong>
                                                {{ $data['tourTampil']->fasilitas_penginapan }}</p>
                                            <p><strong>Fasilitas Konsumsi:</strong>
                                                {{ $data['tourTampil']->fasilitas_konsumsi }}</p>
                                        </div>
                                        <div>
                                            <p><strong>Nama Wisata / Tujuan:</strong></p>
                                            <ul>
                                                @foreach ($namaWisataList as $wisata)
                                                    <li>{{ $wisata->nama_wisata }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="invoice-total_harga" style="text-align:start;">
                                        <p><strong>Total Harga:</strong> Rp
                                            {{ number_format($data['tourTampil']->total_harga, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="invoice-footer">
                                        <a href="{{ route('mCetakTourInvoice.bloomy', ['id_tour' => $data['tourTampil']->id_tour]) }}"
                                            class="btn btn-sm btn-primary">Cetak Invoice</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.theme.footer')
</div>
</div>


</div>
</div>

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
