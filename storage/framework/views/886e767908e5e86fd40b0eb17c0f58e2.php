<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('assets/css/profile.bloomy.css'); ?>">
</head>

<body>
    <?php echo $__env->make("layout.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-5">
        <div class="row">
            <!-- Profile Card -->
            <div class="col-md-4">
                <div class="profile-card">
                    <img src=<?php echo e(url('./assets/images/backgrounds/img-profile1.png')); ?> alt="Profile Picture">
                    <br>
                    <br>
                    <p>Selamat Datang</p>
                    <h5>Nama Username</h5>
                    <br>
                </div>
            </div>

            <!-- Profile Form -->
            <div class="col-md-8">
                <div class="profile-form">
                    <h2>Profil Anda</h2>
                    <form>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" class="form-control" id="address" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor</label>
                            <input type="text" class="form-control" id="phone" placeholder="Nomor">
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control-plaintext" id="email" value="user123@gmail.com" readonly>
                        </div>
                        <button type="button" class="btn btn-primary">Edit</button>
                        <button type="button" class="btn btn-danger">Hapus Akun</button>
                        <button type="button" class="btn btn-secondary">Log Out</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tour History -->
        <div class="tour-history">
            <h4>Riwayat Tour Guide</h4>
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5>Paket 2</h5>
                        <p>Tanggal Pesanan: 1-12-2024</p>
                        <p>Tanggal Selesai: 3-12-2024</p>
                        <p>Harga 300K/Orang</p>
                    </div>
                    <button type="button" class="btn btn-outline-success">Selesai</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5>Paket 1</h5>
                        <p>Tanggal Pesanan: 9-12-2024</p>
                        <p>Tanggal Selesai: 11-12-2024</p>
                        <p>Harga 300K/Orang</p>
                    </div>
                    <button type="button" class="btn btn-outline-success">Selesai</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make("layout.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\BloomyApp-master\AppBloomy\resources\views/profile.blade.php ENDPATH**/ ?>