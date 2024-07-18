<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #daftar,
        #masuk {
            padding: 0;
            background-color: var(--secondary);
            min-height: 100vh;
        }

        #daftar svg,
        #masuk svg {
            height: 20px;
        }

        #daftar .container,
        #masuk .container {
            position: absolute;
            top: 30px;
            left: 0;
            right: 0;
            bottom: 30px;
        }
    </style>
</head>


<body>
    @include('user.theme.navbar')
    <div class="container-lg py-5 h-100 mb-5 mt-5">
        <div class="row d-flex justify-content-center align-items-center h-100 mb-5 mt-5">
            <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                <div class="card shadow-3 px-5" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-1 fw-bold">Daftar</h3>
                        <p class="mb-4">Mari jelajahi Sidoarjo</p>
                        <div class="d-flex flex-column gap-4">
                            <form id="registrationForm" class="form-outline d-flex flex-column gap-2">
                                @csrf
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Username" required>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password 6 Karakter" required>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="E-mail" required>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                    placeholder="Name" required>
                                <input type="file" name="foto" id="foto" class="form-control"
                                    placeholder="Photo" required>
                                <button type="submit" class="btn btn-primary mt-3">Daftar</button>
                            </form>
                            <p>
                                Sudah memiliki akun? <a href="{{ route('login.bloomy') }}"
                                    class="text-dark text-decoration-underline">Masuk sekarang</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.theme.footer')
    <!-- <div id="login-box">
        <form action="#" method="POST">
            <div class="left">
                <h1>Sign up</h1>
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <input type="text" name="email" placeholder="E-mail" />
                <input type="text" name="nama_lengkap" placeholder="Name" />
                <input type="file" name="foto" placeholder="Photo" />

                <input type="submit" name="signup_submit" value="Sign me up" />
            </div>
        </form>

        <div class="right">
            <span class="loginwith">Sign in with<br />social network</span>

            <button class="social-signin facebook">Log in with facebook</button>
            <button class="social-signin twitter">Log in with Twitter</button>
            <button class="social-signin google">Log in with Google+</button>
            <a href="{{ route('login.admin.bloomy') }}">
                <button class="social-signin user">Have Account!</button>
            </a>
        </div>
        <div class="or">OR</div>
    </div> -->
</body>

</html>

<script>
    $(document).ready(function() {
        $('#registrationForm').on('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('prosesUserRegistrasi.user.bloomy') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        window.location.href = "{{ route('login.bloomy') }}";
                    } else {
                        alert('Registrasi gagal: ' + JSON.stringify(response.errors));
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat memproses permintaan Anda.');
                }
            });
        });
    });
</script>
