<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('assets/css/halblog.bloomy.css'); ?>">
</head>

<body>
    <?php echo $__env->make("layout.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="header">
        <a href="/blog-bloomy">Kembali</a>
    </div>
    <div class="container">
        <img src=<?php echo e(url('./assets/images/backgrounds/img1.png')); ?> alt="Monumen Jayandaru">
        <div class="content1">
            <div class="date-author">22 Mei 2024 - Achmad Imam Dairobi</div>
            <h1>Monumen Jayandaru</h1>
            <p>Warga Sidoarjo merapat! Sebagian warga Sidoarjo pasti tak asing lagi dengan Monumen Jayandaru yang berlokasi di jantung Kabupaten Sidoarjo. Tepatnya di Jalan Jenggolo 21, Sidokumpul, Sidoarjo.</p>
        </div>
    </div>
    <div class="content2">
        <h2>Asal-usul Monumen Jayandaru</h2>
        <p>Desain monumen tersebut merepresentasikan keabadian Sekar Group dan warisan Kerupuk Udang, produk makanan Ikon Simbolik dan Tradisional Indonesia. Monumen ini dibangun dari seorang pembuat monumen terkenal di Bali, I Wayan Winten yang telah bertanggung jawab atas beberapa karya seni paling bergengsi di tanah air. Setiap bagian monumen sangat simbolis. Ikan melambangkan keberuntungan dan kemakmuran. Warna monumen didaposi dari warna korporat perusahaan. Struktur dasar dirancang untuk memadankan fondasi yang kuat perusahaan. Ada kuncup bunga yang terbuat dari bahan emas di monumen yang siap mekar, melambangkan kekuatan abadi Grup Sekar. Di kuncup bunganya terdapat kerupuk Udang berwarna emas yang dikelilingi oleh ikan mas yang lincah dan cincin udang yang indah, sumber keberuntungan yang melimpah untuk dinikmati oleh generasi yang tak terhitung jumlahnya. The Jayandaru adalah landmark baru di Indonesia. Ini juga melambangkan produk makanan tradisional Indonesia dan budaya makanan unik yang telah diwariskan dari generasi ke generasi. Merupakan suatu kehormatan besar bagi perusahaan untuk dikait dengan cara ini dan pemerintah mengizinkan monumen semacam itu di tempat umum.</p>
        <p>ada tanggal 29 Mei 2015, Pemerintah Sidoarjo menyelenggarakan upacara peresmian besar Monumen Jayandaru, memuji Grup Sekar atas kontribusi ekonominya kepada masyarakat. Di Indonesia, Grup Sekar terkenal dengan produk makanannya. Merek "Finna" adalah nama yang terkenal dan dihormati karena kualitas Kerupuk Udangnya, yang secara lokal dikenal sebagai "Krupuk". Selain Kerupuk Udang, "Finna" juga dikenal dengan Makanan Ringan dan Bumbu Pertaniannya, seperti Kacang Mede dan Saus. Karena kualitasnya yang luar biasa, Kerupuk Udang "Finna" dikenal sebagai hadiah kenegaraan yang dipersembahkan oleh Pemerintah Indonesia kepada pejabat luar negeri saat berkunjung ke Indonesia.</p>
        <p>Karena kebutuhan untuk keluarganya, Pak Susilo mulai membeli ikan untuk mencari nafkah untuk memberi makan orang tua dan saudara-saudaranya. Secara bertahap, Bapak Susilo mempertemukan yang pembelian bahan baku dari nelayan seperti udang dan hasil laut lainnya. Dari semangat kepeloporannya, ia mengembangkan manufaktur Kerupuk Udang tingkat lanjut yang mulai mendapatkan komoditas pertanian dari petani dan memperdagangkan hasilnya dengan menciptakan produk yang bernilai tambah. Sejak awal yang sangat sederhana yang diciptakan oleh kebutuhan yang sangat mendasar, Bapak Susilo telah meningkatkan mata pencaharian ratusan ribu nelayan dan petani. Bapak Susilo dengan mudah mengakui bahwa pada saat ayahnya mengalami stroke, dia tidak tahu bahwa dia akan terus memberikan kontribusi yang luar biasa bagi negara dan bangsanya.</p>
    </div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.122983218122!2d112.7266283142075!3d-7.445842875455938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e4bdfcc0d50d%3A0x401d0c7d3100ff0!2sMonumen%20Jayandaru!5e0!3m2!1sen!2sid!4v1627129388561!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <?php echo $__env->make("layout.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\BloomyApp-master\AppBloomy\resources\views/blog/halBlog.blade.php ENDPATH**/ ?>