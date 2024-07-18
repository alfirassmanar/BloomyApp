<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/blog.bloomy.css') !!}">
</head>

<body>
    @include('user.theme.navbar')
    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <div class="container">
            <h1 class="display-4">Welcome to My Website!</h1>
            <p class="lead">This is a simple jumbotron example with a background image using Bootstrap.</p>
        </div>
    </div>
    <h1 class="blog-judul">Pariwisata</h1>
    <div class="horizontal-line-1"></div>
    <div class="card-deck m-5" id="blog-wisata-container">
        {{-- isi dari ajax --}}
    </div>
    <h1 class="blog-judul">UMKM</h1>
    <div class="horizontal-line-1"></div>
    <div class="card-deck m-5" id="blog-umkm-container">
        {{-- isi dari ajax --}}
    </div>
    <h1 class="blog-judul">Kuliner</h1>
    <div class="horizontal-line-1"></div>
    <div class="card-deck m-5" id="blog-kuliner-container">
        {{-- isi dari ajax --}}
    </div>
    @include('user.theme.footer')
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .card-text {
            text-align: justify;
        }
    </style>

    {{-- Ajax --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- Wisata --}}
    <script>
        $(document).ready(function() {
            function fetchBlogsWisata() {
                $.ajax({
                    url: '{{ route('TampilBlogWisata.user.bloomy') }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            var blogs = response.blogs;
                            $('#blog-wisata-container').empty();
                            $.each(blogs, function(index, blog) {
                                var formattedTglInput = new Date(blog.tgl_input);
                                var tglInput =
                                    `${formattedTglInput.getDate().toString().padStart(2, '0')}/${(formattedTglInput.getMonth() + 1).toString().padStart(2, '0')}/${formattedTglInput.getFullYear()}`;

                                var namaWisata = blog.wisata ? blog.wisata.nama_wisata :
                                    'Unknown';
                                var namaKategori = blog.kategori ? blog.kategori.kategori :
                                    'Unknown';

                                var artikelBlog = blog.artikel.length > 200 ? blog.artikel
                                    .substring(0, 200) + '...' : blog.artikel;

                                var card = `
                        <div class="card">
                            <div class="card-body">
                                <img src="/storage/admin/fotoBlog/${blog.foto_blog}" class="card-img-top" width="250" height="250" alt="...">
                                <h4 class="card-title mt-3">${namaWisata}</h4>
                                <h6 class="card-title">Kategori : ${namaKategori}</h6>
                                <p class="card-text">${artikelBlog}</p>
                                <p class="card-text"><small class="text-muted">Last updated ${tglInput}</small></p>
                            </div>
                        </div>
                        `;
                                $('#blog-wisata-container').append(card);
                            });
                        } else {
                            $('#blog-wisata-container').html(
                                '<p>Data blog dengan id_kategori 1 tidak ditemukan.</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Call fetchBlogsWisata on page load
            fetchBlogsWisata();
        });
    </script>
    {{-- UMKM --}}
    <script>
        $(document).ready(function() {
            function fetchBlogsUMKM() {
                $.ajax({
                    url: '{{ route('TampilBlogUMKM.user.bloomy') }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            var blogs = response.blogs;
                            $('#blog-umkm-container').empty();
                            $.each(blogs, function(index, blog) {
                                var formattedTglInput = new Date(blog.tgl_input);
                                var tglInput =
                                    `${formattedTglInput.getDate().toString().padStart(2, '0')}/${(formattedTglInput.getMonth() + 1).toString().padStart(2, '0')}/${formattedTglInput.getFullYear()}`;

                                var namaUMKM = blog.umkm ? blog.umkm.nama_umkm : 'Unknown';
                                var namaKategori = blog.kategori ? blog.kategori.kategori :
                                    'Unknown';

                                var artikelBlog = blog.artikel.length > 200 ? blog.artikel
                                    .substring(0, 200) + '...' : blog.artikel;

                                var card = `
                        <div class="card">
                            <div class="card-body">
                                <img src="/storage/admin/fotoBlog/${blog.foto_blog}" class="card-img-top" width="250" height="250" alt="...">
                                <h4 class="card-title mt-3">${namaUMKM}</h4>
                                <h6 class="card-title">Kategori : ${namaKategori}</h6>
                                <p class="card-text">${artikelBlog}</p>
                                <p class="card-text"><small class="text-muted">Last updated ${tglInput}</small></p>
                            </div>
                        </div>
                        `;
                                $('#blog-umkm-container').append(card);
                            });
                        } else {
                            $('#blog-umkm-container').html(
                                '<p>Data blog dengan id_kategori 2 tidak ditemukan.</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Call fetchBlogsUMKM on page load
            fetchBlogsUMKM();
        });
    </script>
    {{-- Kuliner --}}
    <script>
        $(document).ready(function() {
            function fetchBlogsKuliner() {
                $.ajax({
                    url: '{{ route('TampilBlogKuliner.user.bloomy') }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            var blogs = response.blogs;
                            $('#blog-kuliner-container').empty();
                            $.each(blogs, function(index, blog) {
                                var formattedTglInput = new Date(blog.tgl_input);
                                var tglInput =
                                    `${formattedTglInput.getDate().toString().padStart(2, '0')}/${(formattedTglInput.getMonth() + 1).toString().padStart(2, '0')}/${formattedTglInput.getFullYear()}`;

                                var namaKuliner = blog.kuliner ? blog.kuliner.nama_kuliner :
                                    'Unknown';
                                var namaKategori = blog.kategori ? blog.kategori.kategori :
                                    'Unknown';

                                var artikelBlog = blog.artikel.length > 200 ? blog.artikel
                                    .substring(0, 200) + '...' : blog.artikel;

                                var card = `
                        <div class="card">
                            <div class="card-body">
                                <img src="/storage/admin/fotoBlog/${blog.foto_blog}" class="card-img-top" width="250" height="250" alt="...">
                                <h4 class="card-title mt-3">${namaKuliner}</h4>
                                <h6 class="card-title">Kategori : ${namaKategori}</h6>
                                <p class="card-text">${artikelBlog}</p>
                                <p class="card-text"><small class="text-muted">Last updated ${tglInput}</small></p>
                            </div>
                        </div>
                        `;
                                $('#blog-kuliner-container').append(card);
                            });
                        } else {
                            $('#blog-kuliner-container').html(
                                '<p>Data blog dengan id_kategori 3 tidak ditemukan.</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Call fetchBlogsUMKM on page load
            fetchBlogsKuliner();
        });
    </script>
</body>

</html>
