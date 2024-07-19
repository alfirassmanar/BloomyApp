<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidoarjo Explore</title>
    <meta name="dicoding:email" content="d2024y030@dicoding.org">

    <link rel="stylesheet" type="text/css" href="{!! asset('/assets/css/home.bloomy.css') !!}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="dicoding:email" content="d2024y030@dicoding.org">
    @php
        use Illuminate\Support\Facades\Storage;
    @endphp
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <img src={{ url('/assets/images/backgrounds/img-logo.png') }} alt="Image Logo" class="img-logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/blog-bloomy">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/bantuan-bloomy">Bantuan</a>
                </li>
            </ul>
            <div class="d-flex align-items-center ms-auto">
                <a href="{{ session('user') ? route('profile') : '/' }}">
                    <img src="{{ session('user') ? Storage::url('admin/fotoRegistrasi/' . session('user')->foto) : asset('/assets/images/profile/profile-user.png') }}"
                        alt="img" class="user-icon">
                </a>
                @if (session('user'))
                    <span>{{ session('user')->email }}</span>
                    <a class="nav-link btn btn-outline-primary btn-sm"
                        href="{{ route('prosesUserLogout.user.bloomy') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('prosesUserLogout.user.bloomy') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                @else
                    <a class="nav-link btn btn-outline-primary btn-sm"
                        href="{{ route('login.bloomy') }}">Login/Daftar</a>
                @endif
            </div>

        </div>
    </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{-- Logout --}}
<script>
    $(document).ready(function() {
        $('#logout-form').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('prosesUserLogout.user.bloomy') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = "{{ route('login.bloomy') }}";
                    } else {
                        alert('Failed to logout.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while processing your request.');
                }
            });
        });
    });
</script>
