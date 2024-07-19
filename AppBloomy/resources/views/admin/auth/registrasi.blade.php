<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/assets/Clarion.jpeg">
    <title>{{ $data['title'] }}</title>
    <meta name="dicoding:email" content="d2024y030@dicoding.org">

</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);

    *:focus {
        outline: none;
    }

    body {
        margin: 0;
        padding: 0;
        background: #DDD;
        font-size: 16px;
        color: #222;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
    }

    #login-box {
        position: relative;
        margin: 5% auto;
        width: 600px;
        height: 450px;
        background: #FFF;
        border-radius: 2px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
    }

    .left {
        position: absolute;
        top: 0;
        left: 0;
        box-sizing: border-box;
        padding: 40px;
        width: 300px;
        height: 400px;
    }

    h1 {
        margin: 0 0 20px 0;
        font-weight: 300;
        font-size: 28px;
    }

    input[type="text"],
    input[type="password"] {
        display: block;
        box-sizing: border-box;
        margin-bottom: 20px;
        padding: 4px;
        width: 220px;
        height: 32px;
        border: none;
        border-bottom: 1px solid #AAA;
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
        font-size: 15px;
        transition: 0.2s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border-bottom: 2px solid #16a085;
        color: #16a085;
        transition: 0.2s ease;
    }

    input[type="submit"] {
        margin-top: 28px;
        width: 120px;
        height: 32px;
        background: #16a085;
        border: none;
        border-radius: 2px;
        color: #FFF;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        text-transform: uppercase;
        transition: 0.1s ease;
        cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="submit"]:focus {
        opacity: 0.8;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        transition: 0.1s ease;
    }

    input[type="submit"]:active {
        opacity: 1;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
        transition: 0.1s ease;
    }

    .or {
        position: absolute;
        top: 180px;
        left: 280px;
        width: 40px;
        height: 40px;
        background: #DDD;
        border-radius: 50%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        line-height: 40px;
        text-align: center;
    }

    .right {
        position: absolute;
        top: 0;
        right: 0;
        box-sizing: border-box;
        padding: 40px;
        width: 300px;
        height: 400px;
        background: url('https://goo.gl/YbktSj');
        background-size: cover;
        background-position: center;
        border-radius: 0 2px 2px 0;
    }

    .right .loginwith {
        display: block;
        margin-bottom: 10px;
        font-size: 28px;
        color: #FFF;
        text-align: center;
    }

    button.social-signin {
        margin-bottom: 20px;
        width: 220px;
        height: 36px;
        border: none;
        border-radius: 2px;
        color: #FFF;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        transition: 0.2s ease;
        cursor: pointer;
    }

    button.social-signin:hover,
    button.social-signin:focus {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        transition: 0.2s ease;
    }

    button.social-signin:active {
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
        transition: 0.2s ease;
    }

    button.social-signin.facebook {
        background: #32508E;
    }

    button.social-signin.twitter {
        background: #55ACEE;
    }

    button.social-signin.google {
        background: #DD4B39;
    }

    button.social-signin.user {
        background: #32508E;
    }
</style>

<body>
    <div id="login-box">
        <form id="signup_form" action="{{ route('registrasi.admin.bloomy') }}" method="POST">
            @csrf <!-- Tambahkan CSRF token -->
            <div class="left">
                <h1>Sign up</h1>
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="password" placeholder="Password 6 Karakter" />
                <input type="text" name="email" placeholder="E-mail" />
                <input type="text" name="nama_lengkap" placeholder="Name" />
                <input type="file" name="foto" placeholder="Photo" />
                <!-- Hapus atribut name dari tombol submit -->
                <input type="submit" value="Sign me up" />
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
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('form').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('prosesRegistrasi.admin.bloomy') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>


</html>
