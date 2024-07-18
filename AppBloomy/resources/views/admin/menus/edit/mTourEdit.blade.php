@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('mTour.bloomy') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('mTourTambah.bloomy') }}">Tambah Data</a></li>
                    <li class="breadcrumb-item active">Edit Data</li>
                </ol>
            </nav>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">
                            Tour - Edit Data
                        </h5>
                        <div class="card">
                            <div class="card-body">
                                <form id="editForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_tour" value="{{ $data['tourEdit']->id_tour }}">
                                    <div class="mb-3">
                                        <label for="nama_tour" class="form-label">Nama Tour</label>
                                        <input type="text" class="form-control" id="nama_tour" name="nama_tour"
                                            value="{{ $data['tourEdit']->nama_tour }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                                        <input type="datetime-local" class="form-control" id="start_date"
                                            name="tgl_mulai" value="{{ $data['tourEdit']->tgl_mulai }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="end_date" class="form-label">Tanggal
                                            Selesai</label>
                                        <input type="datetime-local" class="form-control" id="end_date"
                                            name="tgl_selesai" value="{{ $data['tourEdit']->tgl_selesai }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lama_tour" class="form-label">Lama Tour</label>
                                        <input type="text" class="form-control" id="lama_tour" name="lama_tour"
                                            value="{{ $data['tourEdit']->lama_tour }}" required readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_wisata" class="form-label">Jalur/Lokasi
                                            Wisata</label>
                                        <select class="form-control" id="id_wisata" required>
                                            @foreach ($getWisata as $gtwisata)
                                                <option value="{{ $gtwisata->id_wisata }}">
                                                    {{ $gtwisata->nama_wisata }}</option>
                                            @endforeach
                                        </select>
                                        <p>Wisata:
                                            @foreach ($namaWisataList as $wisata)
                                                {{ $wisata->nama_wisata }}@if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </p>
                                        <button type="button" id="pilihWisata"
                                            class="btn btn-primary mt-2">Pilih</button>
                                        <input type="hidden" id="id_wisata_selected" name="id_wisata">
                                    </div>

                                    <div class="selected-wisata-list mt-3">
                                        <!-- Tempat untuk menampilkan wisata yang dipilih -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="fasilitas_penginapan" class="form-label">Pilih
                                            Penginapan</label>
                                        <select class="form-control" id="fasilitas_penginapan"
                                            name="fasilitas_penginapan" required>
                                            <option value="">Pilih Penginapan</option>
                                        </select>
                                        <p>Penginapan : {{ $data['tourEdit']->fasilitas_penginapan }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fasilitas_konsumsi" class="form-label">Fasilitas
                                            Komsumsi</label>
                                        <input type="text" class="form-control" id="fasilitas_konsumsi"
                                            name="fasilitas_konsumsi"
                                            value="{{ $data['tourEdit']->fasilitas_konsumsi }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary">Simpan
                                        Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.theme.footer')

</div>
</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Ajax request to get tour data
        $.ajax({
            url: "{{ route('prosesEditTour.bloomy', $data['tourEdit']->id_tour) }}",
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    var tour = response.tour;
                    $('#nama_tour').val(tour.nama_tour);
                    $('#start_date').val(formatDateTime(tour.tgl_mulai));
                    $('#end_date').val(formatDateTime(tour.tgl_selesai));
                    $('#id_wisata').val(tour.id_wisata);
                    $('#fasilitas_penginapan').val(tour.fasilitas_penginapan);
                    $('#fasilitas_konsumsi').val(tour.fasilitas_konsumsi);

                    // Calculate and display tour duration
                    calculateTourDuration();
                } else {
                    console.error(response.message);
                    alert('Gagal mengambil data tour.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat mengambil data tour.');
            }
        });

        // Submit form via Ajax
        $('#editForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('updateTour.bloomy', $data['tourEdit']->id_tour) }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert('Tour berhasil diperbarui!');
                        window.location.href = "{{ route('mTour.bloomy') }}";
                    } else {
                        console.error(response.message);
                        alert('Gagal memperbarui Tour.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat memproses permintaan Anda.');
                }
            });

        });

        // Function to format datetime from server format to input format
        function formatDateTime(datetime) {
            var date = new Date(datetime);
            var formattedDate = date.toISOString().slice(0, 16);
            return formattedDate;
        }

        // Function to calculate tour duration
        function calculateTourDuration() {
            var startDate = new Date($('#start_date').val());
            var endDate = new Date($('#end_date').val());

            if (startDate && endDate && endDate > startDate) {
                // Calculate time difference in milliseconds
                var timeDifference = endDate - startDate;

                // Calculate number of days and nights
                var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                var nights = days - 1;

                // Display result
                $('#lama_tour').val(days + ' hari ' + nights + ' malam');
            } else {
                $('#lama_tour').val('');
            }
        }

        // Event listener for start date change
        $('#start_date').change(calculateTourDuration);

        // Event listener for end date change
        $('#end_date').change(calculateTourDuration);
    });
</script>

{{-- Pilih Wisata --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectWisata = document.getElementById('id_wisata');
        const buttonPilih = document.getElementById('pilihWisata');
        const inputHidden = document.getElementById('id_wisata_selected');
        const selectedList = document.querySelector('.selected-wisata-list');

        let selectedWisata = [];

        buttonPilih.addEventListener('click', function() {
            const selectedOption = selectWisata.options[selectWisata.selectedIndex];
            if (selectedOption && !selectedWisata.includes(selectedOption.value)) {
                selectedWisata.push(selectedOption.value);
                updateSelectedList();
                updateHiddenInput();
            }
        });

        function updateSelectedList() {
            selectedList.innerHTML = '';
            selectedWisata.forEach(function(wisataId) {
                const wisataText = selectWisata.querySelector(`option[value="${wisataId}"]`).text;
                const listItem = document.createElement('div');
                listItem.textContent = wisataText;
                selectedList.appendChild(listItem);
            });
        }

        function updateHiddenInput() {
            inputHidden.value = selectedWisata.join(',');
        }
    });
</script>

<script>
    function calculateTourDuration() {
        const startDate = new Date(document.getElementById('start_date').value);
        const endDate = new Date(document.getElementById('end_date').value);

        if (startDate && endDate && endDate > startDate) {
            // Menghitung selisih dalam milidetik
            const timeDifference = endDate - startDate;

            // Menghitung jumlah hari dan malam
            const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            const nights = days - 1;

            // Menampilkan hasil
            document.getElementById('lama_tour').value = `${days} hari ${nights} malam`;
        } else {
            document.getElementById('lama_tour').value = '';
        }
    }

    document.getElementById('start_date').addEventListener('change', calculateTourDuration);
    document.getElementById('end_date').addEventListener('change', calculateTourDuration);
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        axios.post('/json/dataPenginapan')
            .then(function(response) {

                const penginapanData = response.data;

                const dropdown = document.getElementById('fasilitas_penginapan');

                penginapanData.forEach(function(penginapan) {
                    const option = document.createElement('option');
                    option.value = penginapan.nama;
                    option.textContent = penginapan
                        .nama;
                    dropdown.appendChild(option);
                });
            })
            .catch(function(error) {
                console.error('Error fetching JSON:', error);
            });
    });
</script>

{{-- Logout --}}
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
