<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <?php echo $__env->make("layout.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="payment-box">
            <h1>Bloomy Sidoarjo Explore</h1>
            <div class="payment-details">
                <h2>Total Pembayaran</h2>
                <div class="amount">Rp 300.000</div>
                <div class="method">Metode Pembayaran</div>
                <div class="method">Virtual Account</div>
                <div class="icons">
                    <img src=<?php echo e(url('./assets/images/backgrounds/img-bca.png')); ?> alt="BCA" height="50">
                    <img src=<?php echo e(url('./assets/images/backgrounds/img-mandiri.png')); ?> alt="Mandiri" height="50">
                    <img src=<?php echo e(url('./assets/images/backgrounds/img-bni.png')); ?> alt="BNI" height="50">
                    <img src=<?php echo e(url('./assets/images/backgrounds/img-bjb.png')); ?> alt="BJB" height="50">
                    <img src=<?php echo e(url('./assets/images/backgrounds/img-bsi.png')); ?> alt="BSI" height="50">
                    <img src=<?php echo e(url('./assets/images/backgrounds/img-bri.png')); ?> alt="BRI" height="50">
                </div>
                <br>
                <div class="method">E Wallet</div>
                <div class="icons">
                    <img src=<?php echo e(url('./assets/images/backgrounds/img-GOPAY.png')); ?> alt="Gopay" height="50">
                    <img src=<?php echo e(url('./assets/images/backgrounds/img-ovo.png')); ?> alt="OVO" height="50">
                    <img src=<?php echo e(url('./assets/images/backgrounds/img-dana.png')); ?> alt="DANA" height="50">
                    <img src=<?php echo e(url('./assets/images/backgrounds/img-shopee.png')); ?> alt="ShopeePay" height="50">
                    <img src=<?php echo e(url('./assets/images/backgrounds/imgQRIS.png')); ?> alt="QRIS" height="50">
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make("layout.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\BloomyApp-master\AppBloomy\resources\views/admin/pembayaran.blade.php ENDPATH**/ ?>