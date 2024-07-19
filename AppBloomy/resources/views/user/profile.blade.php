<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="dicoding:email" content="d2024y030@dicoding.org">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/profile.bloomy.css') !!}">
</head>

<body>
    @php
        use Illuminate\Support\Facades\Storage;
    @endphp
    @include('user.theme.navbar')
    <div class="container mt-5">
        <div class="row">
            <!-- Profile Card -->
            <div class="col-md-4">
                <div class="profile-card">
                    <img src={{ Storage::url('admin/fotoRegistrasi/' . session('user')->foto) }} alt="Profile Picture">
                    <br>
                    <br>
                    <p>Selamat Datang</p>
                    <h5>{{ session('user')->username }}</h5>
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
                            <input type="text" class="form-control" id="name" placeholder="Nama"
                                value="{{ session('user')->nama_lengkap }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Username</label>
                            <input type="text" class="form-control" id="address" placeholder="Alamat"
                                value="{{ session('user')->username }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Password</label>
                            <input type="text" class="form-control" id="phone" placeholder="Password">
                            <span style="font-size: 10pt;">Password Sebelumnya : {{ session('user')->password }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email"
                                value="{{ session('user')->email }}" readonly>
                        </div>
                        <button type="button" class="btn btn-outline-primary">Edit</button>
                        <button type="button" class="btn btn-outline-danger">Hapus Akun</button>
                        <a href="{{ route('prosesUserLogout.user.bloomy') }}">
                            <button type="button" class="btn btn-outline-secondary">Log Out</button>
                        </a>
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
    @include('user.theme.footer')
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
