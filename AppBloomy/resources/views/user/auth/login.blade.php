<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @include('user.theme.navbar')
    <div class="container-lg py-5 h-100 mb-5 mt-5">
        <div class="row d-flex justify-content-center align-items-center h-100 mt-5 mb-5">
            <div class="col-12 col-md-8 col-lg-6 col-xl-6 mb-5 mt-5">
                <div class="card shadow-3 px-5" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <h2 class="mb-2 fw-bold">Masuk</h2>
                        <p class="mb-5">Mari jelajahi Sidoarjo</p>
                        <div class="d-flex flex-column gap-4">
                            <form id="login_form" class="form-outline d-flex flex-column gap-2">
                                @csrf
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Email" required>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" required>
                                <button type="submit" class="btn btn-primary mt-3">Masuk</button>
                            </form>
                            <p>
                                Belum memiliki akun? <a href="{{ route('registrasi.bloomy') }}"
                                    class="text-dark text-decoration-underline">Daftar sekarang</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.theme.footer')
    <!-- <div id="login-box">
        <form action="">
            <div class="left">
                <h1>Log In</h1>
                <input type="text" name="email" placeholder="E-mail" />
                <input type="password" name="password" placeholder="Password" />

                <input type="submit" name="submit" value="Log In me" />
            </div>
        </form>
        <div class="right">
            <span class="loginwith">Sign in with<br />social network</span>

            <button class="social-signin google">Log in with Google+</button>
            <a href="{{ route('registrasi.admin.bloomy') }}">
                <button class="social-signin user">Don't Have Account?</button>
            </a>
        </div>
        <div class="or">OR</div>
    </div> -->
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#login_form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: "{{ route('prosesUserLogin.user.bloomy') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        window.location.href = "{{ route('home.bloomy') }}";
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
