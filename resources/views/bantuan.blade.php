<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/bantuan.bloomy.css') !!}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    @include("layout.navbar")
    <h2 class="h">Butuh Bantuan ?</h2>
    <img src={{url('./assets/images/backgrounds/img-cont.png')}} class="container-fluid d-flex justify-content-center align-items-center mb-5 col-md-3  " alt="...">
    <div class="horizontal-line"></div>
    <p class="text">Selamat datang di Pusat Bantuan Bloomy Sidoarjo Explore! Kami di sini untuk membantu Anda menemukan informasi yang Anda butuhkan untuk menjelajahi keindahan Sidoarjo dengan mudah dan nyaman. Apakah Anda mencari rekomendasi tempat wisata terbaik, tips perjalanan, atau bantuan dengan layanan kami,tim kami siap membantu Anda setiap langkahnya. Jelajahi berbagai sumber daya kami dan temukan jawaban atas pertanyaan Anda, atau hubungi kami langsung untuk dukungan personal. Mari buat pengalaman Anda di Sidoarjo tak terlupakan bersama Bloomy Sidoarjo Explore!</p>
    <br>
    <div class="container mt-5 text-decoration-underline">
        <h2 class="text-center">Pertanyaan Yang Sering Di Tanyakan</h2>
        <div class="accordion mt-4" id="faqAccordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-2 mt-2">
                        <button class="btn btn-link btn-block text-left a" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Bagaimana Cara Registasi?
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Anda dapat melakukan registrasi dengan mengklik tombol "Daftar" di pojok kanan atas halaman.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-2 mt-2">
                        <button class="btn btn-link btn-block text-left a collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Bagaimana Cara Mendaftar Tour Guide?
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        Untuk mendaftar sebagai Tour Guide, silakan isi formulir pendaftaran di halaman "Tour Guide".
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-2 mt-2">
                        <button class="btn btn-link btn-block text-left a collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Apakah Tour Guidenya Bisa Di percaya?
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Semua Tour Guide kami telah melalui proses seleksi ketat dan memiliki sertifikasi resmi.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-2 mt-2">
                        <button class="btn btn-link btn-block text-left a collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Adakah Versi Mobilenya?
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                    <div class="card-body">
                        Ya, aplikasi kami tersedia dalam versi mobile untuk Android dan iOS.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFive">
                    <h2 class="mb-2 mt-2">
                        <button class="btn btn-link btn-block text-left a collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Adakah Rekomendasi Kuliner Di Sidoarjo?
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                    <div class="card-body">
                        Kami menyediakan daftar rekomendasi kuliner terbaik di Sidoarjo yang bisa Anda coba.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    @include("layout.footer")
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>