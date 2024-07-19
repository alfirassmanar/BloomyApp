<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="dicoding:email" content="d2024y030@dicoding.org">

    <title>Form Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            text-align: center;
            padding: 20px;
        }

        .payment-box {
            width: 600px;
            background-color: #1f2348;
            color: white;
            border-radius: 10px;
            padding: 20px;
            display: inline-block;
        }

        .payment-box h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .payment-details {
            background-color: white;
            color: black;
            border-radius: 10px;
            padding: 20px;
            margin-top: 10px;
        }

        .payment-details h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .payment-details .amount {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .payment-details .method {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .payment-details .icons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .payment-details .qr-code {
            margin: 20px 0;
        }

        .payment-details .qr-code img {
            width: 150px;
            height: 150px;
        }

        .payment-details .submit-button {
            background-color: #1f2348;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .payment-details .submit-button:hover {
            background-color: #333;
        }

        .footer {
            background-color: #1f2348;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: auto;
        }

        .footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    @include('user.theme.navbar')
    <div class="container">
        <h1 class="m-3">Form Pembayaran</h1>
        <div class="payment-box">
            <h1>Bloomy Sidoarjo Explore</h1>
            <div class="payment-details">
                <h2>Total Pembayaran</h2>
                <div class="amount">Rp 300.000</div>
                <div class="method">QRIS</div>
                <div class="qr-code">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Example" alt="QR Code">
                </div>
                <button class="submit-button">Kirim Bukti Pembayaran</button>
            </div>
        </div>
    </div>
    @include('user.theme.footer')
</body>

</html>
