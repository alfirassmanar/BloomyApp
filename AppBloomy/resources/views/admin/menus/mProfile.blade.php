@include('admin.theme.header')

<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                            </a>
                            <div style="text-align: center;">
                                @php
                                    use Illuminate\Support\Facades\Storage;
                                @endphp
                                @if ($user->username == 'GoogleLogin')
                                    <img src="{{ asset('admin/fotoLoginEmail/email.jpg') }}" alt="Default Photo"
                                        width="200" height="200" class="rounded-circle">
                                @else
                                    @if (Storage::exists('admin/fotoRegistrasi/' . $user->foto))
                                        <img src="{{ Storage::url('admin/fotoRegistrasi/' . $user->foto) }}"
                                            alt="Profile Photo" width="200" height="200" class="rounded-circle">
                                    @else
                                        <img src="{{ Storage::url('admin/fotoRegistrasi/' . $user->foto) }}"
                                            alt="Profile Photo" width="200" height="200" class="rounded-circle">
                                    @endif
                                @endif

                            </div>
                            <hr>
                            <form>
                                <div class="mb-3">
                                    <input type="text" class="form-control mt-3" value="{{ $user->nama_lengkap }}"
                                        style="text-align: center;" disabled>
                                </div>
                                <div class="mb-4">
                                    <input type="text" class="form-control mt-3" value="{{ $user->email }}"
                                        style="text-align: center;" disabled>
                                </div>
                                <div class="mb-4">
                                    <input type="text" class="form-control" value="{{ $user->username }}"
                                        style="text-align: center;" disabled>
                                </div>

                                <a href="#" id="logoutBtn" class="btn btn-outline-danger mx-3 mt-2 d-block">Logout
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.theme.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#logoutBtn').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('prosesLogout.admin.bloomy') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = "{{ route('login.admin.bloomy') }}";
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

</body>

</html>
