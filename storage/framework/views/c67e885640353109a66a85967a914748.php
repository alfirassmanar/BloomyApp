<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('assets/css/blog.bloomy.css'); ?>">
</head>

<body>
    <?php echo $__env->make("layout.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <div class="container">
            <h1 class="display-4">Welcome to My Website!</h1>
            <p class="lead">This is a simple jumbotron example with a background image using Bootstrap.</p>
        </div>
    </div>
    <h1 class="blog-judul">Pariwisata</h1>
    <div class="horizontal-line-1"></div>
    <div class="card-deck m-5">
        <div class="card">
            <img src="./assets/images/backgrounds/img-blog1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Monumen Jayandaru</h5>
                <p class="card-text">
                    Monumen Jayandaru memiliki tinggi 23 meter dengan lebar alas 75,8 meter. Desain monumen tersebut merepresentasikan keabadian Sekar Group dan warisan Kerupuk Udang, produk makanan Ikon Simbolik dan Tradisional Indonesia. Monumen ini dibangun dari seorang pembuat monumen terkemuka di Bali, I Wayan Winten yang telah bertanggung jawab atas beberapa karya seni paling bergengsi di tanah air. Setiap bagian monumen sangat simbolis. Ikan melambangkan keberuntungan dan kemakmuran. Warna monumen diadopsi dari warna korporat perusahaan. Struktur dasar dirancang untuk menandakan fondasi yang kuat perusahaan. Ada kuncup bunga indah yang tertanam di bagian atas monumen yang siap mekar, melambangkan kekuatan abadi Grup Sekar.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="./assets/images/backgrounds/img-blog1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Candi Pari</h5>
                <p class="card-text">Candi Pari adalah sebuah peninggalan masa klasik Indonesia yang terletak di Desa Candipari, Kecamatan Porong, Kabupaten Sidoarjo, Provinsi Jawa Timur. Lokasinya sekitar 2 km ke arah barat laut dari pusat semburan Lumpur Lapindo.Menurut batu yang tertulis di atas gerbang, candi ini dibangun pada tahun 1293 Saka (1371 Masehi). Batu ini merupakan peninggalan zaman Majapahit pada masa pemerintahan Prabu Hayam Wuruk (1350–1389 M).Candi ini ditemukan pada tanggal 16 Oktober 1906 oleh pemerintah kolonial Hindia Belanda. Candi ini dipugar pada tahun 1994–1996 oleh Kantor Wilayah Departemen Pendidikan dan Kebudayaan dan SPSB Jawa Timur.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="./assets/images/backgrounds/img-blog1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Museum Mpu Tantular</h5>
                <p class="card-text">Museum Negeri Mpu Tantular adalah sebuah museum negeri yang berlokasi di kecamatan Buduran, Sidoarjo, Jawa Timur. Awalnya, museum ini bernama Stedelijk Historisch Museum Soerabaia, didirikan oleh Godfried von Faber pada tahun 1933 dan diresmikan pada tanggal 25 Juli 1937.Sampai dengan pendataan tahun 2021 koleksi Museum Mpu Tantular mencapai 15.600 buah koleksi yang digolongkan menjadi sepuluh jenis koleksi, yaitu: geologika, biologika, etnografika, historika, numismatika, heraldika, seni rupa, teknologika, keramologika dan filologika.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <h1 class="blog-judul">UMKM</h1>
    <div class="horizontal-line-1"></div>
    <div class="card-deck m-5">
        <div class="card">
            <img src="./assets/images/backgrounds/img-blog1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">UD. EKA PROMA</h5>
                <p class="card-text">Pertama kali didirikan pada tahun 1990, dengan nama Proma, pada saat itu masih berstatus home industri yang membuat sepatu sandal dan berlokasi di Dusun Mojosantren – Krian, Sidoarjo Indonesia. Awalnya Proma memfokuskan membuat sepatu sandal seperti balet dan selop.Kemudian, sekitar tahun 1999 Proma berusaha untuk mengembangkan produksinya dengan memproduksi bahan baku sepatu dan sandal seperti sol. Produksi utama Proma dikembangkan dengan memproduksi bahan sepatu sandal yang lebih bervariasi lagi untuk dipasarkan pada awal tahun 2000-an.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="./assets/images/backgrounds/img-blog1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">KERAJINAN KULIT DI TANGGULANGIN SIDOARJO</h5>
                <p class="card-text">Sidoarjo juga dikenal mempunyai sentra pengerajin kulit yaitu terletak di kecamatan Tanggulangin, lebih tepatnya di desa Kludan. Tanggulangin memang sudah lama dikenal sebagai salah satu penghasil kerjinan kulit terbesar di Jawa Timur. Kualitas produknya juga sangat memuaskan dan telah diakui dunia internasional dengan harga yang lebih murah dibandingkan dengan harga pasaran.
                    Tidak heran ketika memasuki area industri kecil di Kludan, kita akan disuguhi pemandangan ruko dan showroom yang berada di kanan maupun kiri jalan.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="./assets/images/backgrounds/img-blog1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Batik Jetis, Sidoarjo</h5>
                <p class="card-text">Batik Tulis Jetis merupakan karya budaya yang terus dikembangkan di Dusun Jetis dan Pekauman, Kelurahan Lemahputro, Kecamatan Sidoarjo.
                    Jika dilihat dari sejarahnya, industri batik Jetis sudah ada sejak tahun 1675. Batik tulis awalnya dibawa ke daerah Jetis oleh Mbah Mulyadi yang merupakan keturunan Raja Kediri yang lari ke Sidoarjo karena dikejar oleh Belanda. Mbah Mulyadi disebut telah memotivasi penduduk Jetis untuk mengembangkan budaya membatik menjadi salah satu kegiatan ekonomi di wilayah Jetis.
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <h1 class="blog-judul">Kuliner</h1>
    <div class="horizontal-line-1"></div>
    <div class="card-deck m-5   ">
        <div class="card">
            <img src="./assets/images/backgrounds/img-blog1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Lontong kupang</h5>
                <p class="card-text">Di daerah pesisir timur Jawa Timur, lontong kupang yang terkenal adalah Kupang Kraton. Nama Kraton ini diambil dari suatu nama daerah atau suatu nama kecamatan di Kabupaten Pasuruan. Sudah sejak lama penduduk daerah ini mencari dan berdagang kerang kupang, baik dijual mentah ataupun berupa kuliner (lontong kupang).

                    Masyarakat mempercayai apabila memakan lontong kupang sambil minum air kelapa muda (Jawa: degan) atau dengan es batu yaitu es degan semua penyakit di dalam tubuh bisa hilang, manusia yang memakan itu pun menjadi sehat. </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="./assets/images/backgrounds/img-blog1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Tahu tek</h5>
                <p class="card-text">Tahu tek adalah salah satu masakan khas Jawa Timur khususnya di Kota Surabaya. Tahu tek terdiri atas tahu goreng setengah matang dan lontong yang dipotong kecil-kecil dengan alat gunting dan garpu untuk memegang tahu atau lontong, telur, kentang goreng, sedikit taoge, dan irisan ketimun dipotong kecil-panjang (seperti acar), lalu setelah disiram dengan saus kacang dengan campuran petis di atasnya, ditaburkan kerupuk udang yang bentuknya kecil dengan diameter sekitar 3 cm.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="./assets/images/backgrounds/img-blog1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Sate kerang</h5>
                <p class="card-text">Sate kerang adalah makanan khas Indonesia terutama dari kota Surabaya dan Sidoarjo. Sate kerang berbahan dasar kerang yang umumnya berasal dari jenis kerang hijau (Perna viridis L).Keunikan bagi sate ini adalah daging kerang yang digunakan tidak dibakar atau dipanggang seperti layaknya sate lainnya, melainkan direbus. Sate ini biasanya disajikan bersama dengan lontong kupang, lontong balap, kecap dan sambal. Kerang merupakan hidangan laut yang dapat dikreasikan jadi berbagai menu.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <?php echo $__env->make("layout.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\BloomyApp-master\AppBloomy\resources\views/blogBloomy.blade.php ENDPATH**/ ?>