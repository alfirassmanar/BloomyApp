<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/registToguide.bloomy.css') !!}">
</head>

<body>
    @include('user.theme.navbar')
    <h1 class="text-center mt-5">Registrasi Tour Guide</h1>
    <div class="container-reg mt-5 mb-5 m-5">
        <div class="form-container">
            <h3 class="text-center">Pesanan</h3>
            <div class="form-group">
                <label for="tanggal-liburan">Tanggal Liburan</label>
                <input type="date" id="tanggal-liburan" name="tanggal-liburan">
            </div>
            <div class="form-group">
                <label for="tiket">Tiket</label>
                <input type="text" id="tiket" name="tiket">
            </div>
            <div class="form-group">
                <label for="paket-wisata">Paket Wisata</label>
                <select id="paket-wisata" name="paket-wisata">
                    <option value="1">Paket 1</option>
                    <option value="2">Paket 2</option>
                </select>
            </div>
            <button class="btn">Konfirmasi</button>
        </div>

        <div class="card">
            <img src={{ url('./assets/images/backgrounds/paket1.png') }} class="card-img-top custom-rounded"
                alt="...">
            <div class="content">
                <p>Paket Tour Guide Satu</p>
                <p>2 Hari 1 Malam</p>
                <ul>
                    <li>Jalur Wisata: Monumen Jayandaru &rarr; Suncity Waterpark Sidoarjo &rarr; Museum Empu Tantular
                        &rarr; Rumah Katun Sidoarjo</li>
                    <li>Hotel Satu Malam</li>
                    <li>Makan 3 x Sehari (Makan Di Hotel 2x)</li>
                </ul>
                <p class="price">Harga: 300K/Orang</p>
            </div>
        </div>
    </div>
    @include('user.theme.footer')
</body>

</html>
