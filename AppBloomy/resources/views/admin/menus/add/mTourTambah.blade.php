@include('admin.theme.header')
@include('admin.theme.navProfile')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('mTour.bloomy') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">
                            Tour - Tambah Data
                        </h5>
                        <div class="card">
                            <div class="card-body">
                                <form id="addForm">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_tour" class="form-label">Nama Tour</label>
                                        <input type="text" class="form-control" placeholder="Paket..." id="nama_tour"
                                            name="nama_tour" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_guide" class="form-label">Tour Guide</label>
                                        <select class="form-control" id="nama_guide" name="nama_guide" required>
                                            @foreach ($getPekerja as $gtPekerja)
                                                <option value="{{ $gtPekerja->id_pekerja }}">
                                                    {{ $gtPekerja->user->nama_lengkap }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                                        <input type="datetime-local" class="form-control" id="start_date"
                                            name="tgl_mulai" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="end_date" class="form-label">Tanggal
                                            Selesai</label>
                                        <input type="datetime-local" class="form-control" id="end_date"
                                            name="tgl_selesai" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lama_tour" class="form-label">Lama Tour</label>
                                        <input type="text" class="form-control" id="lama_tour" name="lama_tour"
                                            readonly>
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
                                        <button type="button" id="pilihWisata"
                                            class="btn btn-primary mt-2">Pilih</button>
                                        <input type="hidden" id="id_wisata_selected" name="id_wisata">
                                    </div>

                                    <div class="selected-wisata-list mt-3">
                                        <!-- Tempat untuk menampilkan wisata yang dipilih -->
                                    </div>

                                    {{-- <div class="mt-2" id="select_wisata_button"></div> --}}
                                    <div class="mb-3">
                                        <label for="fasilitas_penginapan" class="form-label">Pilih
                                            Penginapan</label>
                                        <select class="form-control" id="fasilitas_penginapan"
                                            name="fasilitas_penginapan" required>
                                            <option value="">Pilih Penginapan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fasilitas_konsumsi" class="form-label">Konsumsi</label>
                                        <input type="text" class="form-control" id="fasilitas_konsumsi"
                                            name="fasilitas_konsumsi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="total_harga" class="form-label">Total Harga</label>
                                        <input type="number" class="form-control" id="total_harga" name="total_harga"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary">Tambah
                                        Tour</button>
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

{{-- Tambah Data --}}
<script>
    $(document).ready(function() {
        $('#addForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('prosesTambahTour.bloomy') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    alert('Tour berhasil ditambahkan!');
                    window.location.href = "{{ route('mTour.bloomy') }}";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat menambahkan Tour.');
                }
            });
        });
    });
</script>

{{-- Select Wisata Button --}}
{{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectedWisata = JSON.parse(sessionStorage.getItem('selected_wisata')) || [];

            renderSelectedWisataButtons(selectedWisata);

            document.getElementById('id_wisata').addEventListener('change', function(event) {
                const selectedId = event.target.value;

                if (selectedId && !selectedWisata.find(wisata => wisata.id === selectedId)) {
                    const selectedOption = event.target.options[event.target.selectedIndex];
                    const selectedText = selectedOption.textContent
                        .trim(); // Mengambil teks dari opsi terpilih

                    selectedWisata.push({
                        id: selectedId,
                        name: selectedText
                    });

                    sessionStorage.setItem('selected_wisata', JSON.stringify(selectedWisata));
                    renderSelectedWisataButtons(selectedWisata);
                }
            });

            function renderSelectedWisataButtons(wisatas) {
                const container = document.getElementById('select_wisata_button');
                container.innerHTML = '';
                wisatas.forEach(wisata => {
                    const button = document.createElement('button');
                    button.textContent = `${wisata.name} [X]`;
                    button.className = 'btn btn-sm btn-success me-2 mb-2';
                    button.addEventListener('click', function() {
                        removeWisata(wisata.id);
                    });
                    container.appendChild(button);
                });
            }

            function removeWisata(id) {
                const index = selectedWisata.findIndex(wisata => wisata.id === id);
                if (index !== -1) {
                    selectedWisata.splice(index, 1);
                    sessionStorage.setItem('selected_wisata', JSON.stringify(selectedWisata));
                    renderSelectedWisataButtons(selectedWisata);
                }
            }
        });
    </script> --}}

{{-- Script All --}}
{{-- Start & End Date --}}
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
{{-- <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>

    <script>
        const platform = new H.service.Platform({
            apikey: 'k1gb3KO1B-4SMQaCFxfZ1XcpSd_bduHxu73iYEaxeJY'
        });

        const searchService = platform.getSearchService();
        const sidoarjoCoordinates = {
            lat: -7.4478,
            lng: 112.7183
        };

        function searchPlaces() {
            const params = {
                at: `${sidoarjoCoordinates.lat},${sidoarjoCoordinates.lng}`
            };

            return new Promise((resolve, reject) => {
                searchService.discover(params, (result) => {
                    resolve(result);
                }, (error) => {
                    reject(error);
                });
            });
        }


        function populateDropdown(items) {
            const dropdown = document.getElementById('fasilitas_penginapan');
            dropdown.innerHTML = ''; // Bersihkan opsi sebelum menambahkan yang baru
            items.forEach(item => {
                const option = document.createElement('option');
                option.value = item.title;
                option.text = item.title;
                dropdown.appendChild(option);
            });
        }

        searchPlaces();
    </script> --}}
{{-- Script All --}}

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
