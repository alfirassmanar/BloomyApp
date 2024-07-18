@include('user.theme.navbar')
<section>
    <!-- <div class="card1 mb-1" style="max-width: 100%; background-color:#10439F;">
        <div class="row g-10">
            <div class="col-md-6">
                <div class="card-body">
                    <h2 class="card-title-judul1">Mari jelajahi Sidoarjo</h2>
                    <h2 class="card-title-judul2">bersama kami</h2>
                    <h5 class="card-text-text1">Liburan Bersama Keluarga Seru Dan Menyenangkan</h5>
                </div>
            </div>
            <div class="col-md-5">
                <img src={{ url('/assets/images/backgrounds/img1.png') }} class="img-fluid rounded-start max-vh-250 max-vw-350 mt-auto p-5" alt="...">
            </div>
        </div>
    </div> -->

    <div class="jumbotron jumbotron-custom">
        <div class="content">
            <h2 class="card-title-judul1">Mari jelajahi Sidoarjo</h2>
            <h2 class="card-title-judul2">bersama kami</h2>
            <h5 class="card-text-text1">Liburan Bersama Keluarga Seru Dan Menyenangkan</h5>
        </div>
        <div class="image">
            <img src={{ url('/assets/images/backgrounds/img1.png') }} alt="Jumbotron Image">
        </div>
    </div>
</section>
<h2 class="judul1">Bingung Cari Tour Guide Di Sidoarjo ?</h2>
<h4 class="judul2">Kami Menyediakan 2 Paket Tour Guide </h4>
<div class="horizontal-line"></div>
<section>
    <div class="container">
        <div class="row row-cols-1 mb-5 row-cols-md-1 g-4 d-flex justify-content-center align-items-center">
            <div class="row" id="tour-container">
                <!-- Tour cards will be appended here -->
            </div>
        </div>
    </div>
    {{-- <div class="col" style="width: 25rem;">
            <div class="card custom-rounded">
                <img src={{ url('/assets/images/backgrounds/paket2.png') }} class="card-img-top custom-rounded"
                    alt="...">
                <div class="card-body">
                    <div class="content">
                        <h5 class="card-title1">Paket Tour Guide Dua
                            2 Hari 1 Malam</h5>
                        <p>2 Hari 1 Malam</p>
                        <ul>
                            <li>Jalur Wisata: Candi Pari &rarr; Suncity Waterpark Sidoarjo &rarr; KERAJINAN KULIT DI
                                TANGGULANGIN SIDOARJO &rarr; Batik Jetis, Sidoarjo</li>
                            <li>Hotel Satu Malam</li>
                            <li>Makan 3 x Sehari (Makan Di Hotel 2x)</li>
                        </ul>
                        <p class="price">Harga: 300K/Orang</p>
                    </div>
                </div>
            </div>
        </div> --}}
</section>
<section>
    <div class="card1 mb-1" style="max-width: 100%;">
        <div class="row g-10">
            <div class="container-fluid d-flex justify-content-center align-items-center full-height mb-4 col-md-5">
                <img src={{ url('/assets/images/backgrounds/grouping.png') }}
                    class="img-fluid max-vh-250 max-vw-350 mt-auto p-5 img-group" alt="...">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h2 class="card-title-footer1">Ayo Lebih Mengenal</h2>
                    <h2 class="card-title-footer">Sidoarjo</h2>
                    <p class="card-text-footer">Kami Juga Memiliki Informasi Menarik Untuk<br> Tentang Pariwisata, UMKM,
                        Dan Kuliner</p>
                    <div class="container-fluid d-flex justify-content-center align-items-center full-height">
                        <button class="btn btn-primary" href="/blog-bloomy">Lebih Mengenal Sidoarjo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="card2 mb-0" style="max-width: 100%;">
        <div class="row g-10">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title-foot2">Testimoni Pengunjung</h5>
                    <p class="card-text-foot1">"Blomy Sidoarjo Explore Sangat Membantu sekali untuk keluarga yang ingin
                        berlibur di kabupaten sidoarjo dan jelas Blomy Sidoarjo Explore sangat membantu sekali bagi UMKM
                        setempat."</p>
                    <div class="container-fluid d-flex justify-content-center align-items-center full-height mb-5">
                        <img src="{{ url('/assets/images/backgrounds/img-profile1.png') }}" alt="Centered Image">
                        <p class="aini">Aini
                            <br>
                            Ibu Rumah Tangga
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
@include('user.theme.footer')
{{-- Ajax --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        function fetchTours() {
            $.ajax({
                url: '{{ route('TampilTour.user.bloomy') }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        var tours = response.tour.data;
                        $('#tour-container').empty();

                        $.each(tours, function(index, tour) {
                            var tglMulai = new Date(tour.tgl_mulai);
                            var tglSelesai = new Date(tour.tgl_selesai);
                            var formattedTglMulai =
                                `${tglMulai.getDate().toString().padStart(2, '0')}/${(tglMulai.getMonth() + 1).toString().padStart(2, '0')}/${tglMulai.getFullYear()}`;
                            var formattedTglSelesai =
                                `${tglSelesai.getDate().toString().padStart(2, '0')}/${(tglSelesai.getMonth() + 1).toString().padStart(2, '0')}/${tglSelesai.getFullYear()}`;

                            // Mengambil data nama wisata dari id_wisata di Wisata melalui relasi wisatas di Tour
                            var namaWisataList = (tour.wisatas && tour.wisatas.length) ?
                                tour.wisatas.map(function(wisata) {
                                    return wisata.nama_wisata;
                                }).join(', ') : 'Unknown';

                            var card = `
                        <div class="col" style="width: 25rem;">
                            <div class="card custom-rounded">
                                <img src="{{ url('/assets/images/backgrounds/paket1.png') }}" class="card-img-top custom-rounded" alt="...">
                                <div class="card-body">
                                    <div class="content">
                                        <h5 class="card-title1">Paket Tour: ${tour.nama_tour}</h5>
                                        <h6>Waktu: ${formattedTglMulai} - ${formattedTglSelesai}</h6>
                                        <ul>
                                            <li>Jalur Wisata: ${namaWisataList}</li>
                                            <li>Penginapan: ${tour.fasilitas_penginapan}</li>
                                            <li>Konsumsi: ${tour.fasilitas_konsumsi}</li>
                                        </ul>
                                        <p class="price">Harga: ${tour.total_harga}K/Orang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                            $('#tour-container').append(card);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Call fetchTours on page load
        fetchTours();
    });
</script>
