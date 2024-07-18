<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Tour</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .invoice-container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #f4f4f9;
            padding-bottom: 10px;
        }

        .invoice-header h4 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .invoice-header img {
            height: 50px;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }

        .invoice-details strong {
            color: #333;
        }

        .invoice-details ul {
            margin: 10px 0 0 20px;
            padding: 0;
            list-style-type: disc;
            color: #555;
        }

        .invoice-details li {
            margin: 5px 0;
        }

        .invoice-total {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 2px solid #f4f4f9;
            text-align: right;
        }

        .invoice-total p {
            font-size: 18px;
            color: #333;
        }

        .invoice-footer {
            margin-top: 20px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h4>Invoice Tour</h4>
        </div>
        <div class="invoice-details">
            <div>
                <p><strong>Nama Tour:</strong> {{ $data['tourTampil']->nama_tour }}</p>
                <p><strong>Tour Guide:</strong> {{ $data['tourTampil']->pekerja->user->nama_lengkap }}</p>
                <p><strong>Tanggal Mulai:</strong> {{ $data['tourTampil']->tgl_mulai }}</p>
                <p><strong>Tanggal Selesai:</strong> {{ $data['tourTampil']->tgl_selesai }}</p>
                <p><strong>Fasilitas Penginapan:</strong> {{ $data['tourTampil']->fasilitas_penginapan }}</p>
                <p><strong>Fasilitas Konsumsi:</strong> {{ $data['tourTampil']->fasilitas_konsumsi }}</p>
            </div>
            <div>
                <p><strong>Nama Wisata / Tujuan:</strong></p>
                <ul>
                    @foreach ($data['namaWisataList'] as $wisata)
                        <li>{{ $wisata->nama_wisata }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="invoice-total">
            <p><strong>Total Harga:</strong> Rp {{ number_format($data['tourTampil']->total_harga, 0, ',', '.') }}</p>
        </div>
    </div>
</body>

</html>
