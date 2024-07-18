<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item d-flex align-items-center">
                <a class="nav-link nav-icon-hover d-flex align-items-center" href="javascript:void(0)">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle ml-2"></div>
                </a>
                <div class="ml-2 d-none d-sm-block">
                    <span style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                        Selamat Datang
                    </span>
                    @php
                        use Illuminate\Support\Facades\Storage;
                    @endphp
                    <span style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                        : {{ $user->nama_lengkap }}
                    </span> |
                    <i><b><span id="datetime">Loading...</span></b></i>
                </div>
            </li>
        </ul>

        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if ($user->username == 'GoogleLogin')
                            <img src="{{ asset('admin/fotoLoginEmail/email.jpg') }}" alt="Default Photo" width="35"
                                height="35" class="rounded-circle">
                        @else
                            @if (Storage::exists('admin/fotoRegistrasi/' . $user->foto))
                                <img src="{{ Storage::url('admin/fotoRegistrasi/' . $user->foto) }}" alt="Profile Photo"
                                    width="35" height="35" class="rounded-circle">
                            @else
                                <img src="{{ Storage::url('admin/fotoRegistrasi/' . $user->foto) }}" alt="Profile Photo"
                                    width="35" height="35" class="rounded-circle">
                            @endif
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="{{ route('mProfile.bloomy', ['id_user' => $user->id_user]) }}"
                                class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">My Profile</p><br>
                            </a>

                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">{{ $user->email }}</p>
                            </a>
                            <a href="#" id="logoutBtn" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<script>
    function displayDateTime() {
        var options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            timeZone: 'Asia/Jakarta'
        };
        var formattedDate = new Date().toLocaleDateString('id-ID', options);
        document.getElementById('datetime').innerHTML = formattedDate;
    }

    // Update every second
    setInterval(displayDateTime, 1000);

    // Initialize on page load
    window.onload = function() {
        displayDateTime();
    };
</script>
