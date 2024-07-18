<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidoarjo Explore</title>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('assets/css/home.bloomy.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <img src=<?php echo e(url('./assets/images/backgrounds/img-logo.png')); ?> alt="Image Logo" class="img-logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/blog-bloomy">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/bantuan-bloomy">Bantuan</a>
                </li>
            </ul>
            <div class="d-flex align-items-center ms-auto">
                <img src="./assets/images/profile/profile-user.png" alt="User Icon" class="user-icon">
                <a class="nav-link" href="<?php echo e(route('login.admin.bloomy')); ?>">Login/Daftar</a>
            </div>
        </div>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\BloomyApp-master\AppBloomy\resources\views/layout/navbar.blade.php ENDPATH**/ ?>