<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/contact.person.css') !!}">
</head>

<body>
    @include('user.theme.navbar')
    <h2 class="text-center">Hubungi Kami !</h2>
    <div class="text2">
        <p>
            Kami di Bloomy Sidoarjo Explore selalu siap mendengarkan Anda. Apakah Anda memiliki pertanyaan, saran, atau
            membutuhkan bantuan terkait perjalanan dan penjelajahan di Sidoarjo, tim kami dengan senang hati akan
            membantu Anda. Silakan hubungi kami melalui metode berikut:
        </p>
        <ul>
            <li>Email: Kirimkan pertanyaan Anda ke Email kami dan kami akan merespons secepatnya.</li>
            <li>Telepon: Butuh jawaban lebih cepat? Hubungi kami di Nomor Telephone kami.</li>
            <li>Media Sosial: Ikuti kami di media sosial dan DM kami kapan saja.</li>
        </ul>
        <p>
            Kami menghargai setiap masukan dan akan berusaha untuk memberikan layanan terbaik bagi Anda. Terima kasih
            telah memilih Bloomy Sidoarjo Explore sebagai teman perjalanan Anda!
        </p>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form">
                    <h4 class="text-center">Kirim Pertanyaan Mu!</h4>
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" placeholder="Nama">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">No. Telepon</label>
                                <input type="text" class="form-control" id="phone" placeholder="No. Telepon">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" placeholder="Status">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" rows="4" placeholder="Deskripsi"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('user.theme.footer')
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
