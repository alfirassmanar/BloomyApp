@include('admin.theme.header')
@include('admin.theme.navProfile')

<h1>Statistika Komputasi</h1>

<div class="card">
    <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.bloomy') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Kepuasan Penggunaan Website</li>
            </ol>
        </nav>
        {{-- <button class="btn btn-sm btn-primary mb-2" onclick="exportToCSV()">Export to CSV</button> --}}
        <button class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#openChoice">Export to
            CSV</button>
        <div class="table-responsive">
            <table id="laporanTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Review</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Tujuan</th>
                        <th>NP1</th>
                        <th>NP2</th>
                        <th>NP3</th>
                        <th>NP4</th>
                        <th>NP5</th>
                        <th>NP6</th>
                        <th>NP7</th>
                        <th>NP8</th>
                        <th>NP9</th>
                        <th>NP10</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporansPaginate as $laporan)
                        <tr>
                            <td>{{ $laporan->id_review }}</td>
                            <td>{{ $laporan->email }}</td>
                            <td>{{ $laporan->nama_lengkap }}</td>
                            <td>{{ $laporan->tujuan }}</td>
                            <td>{{ $laporan->np1 }}</td>
                            <td>{{ $laporan->np2 }}</td>
                            <td>{{ $laporan->np3 }}</td>
                            <td>{{ $laporan->np4 }}</td>
                            <td>{{ $laporan->np5 }}</td>
                            <td>{{ $laporan->np6 }}</td>
                            <td>{{ $laporan->np7 }}</td>
                            <td>{{ $laporan->np8 }}</td>
                            <td>{{ $laporan->np9 }}</td>
                            <td>{{ $laporan->np10 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- All Data --}}
            <table id="laporanTableAllData" class="table table-bordered" hidden>
                <thead>
                    <tr>
                        <th>ID Review</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Tujuan</th>
                        <th>NP1</th>
                        <th>NP2</th>
                        <th>NP3</th>
                        <th>NP4</th>
                        <th>NP5</th>
                        <th>NP6</th>
                        <th>NP7</th>
                        <th>NP8</th>
                        <th>NP9</th>
                        <th>NP10</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporans as $laporan)
                        <tr>
                            <td>{{ $laporan->id_review }}</td>
                            <td>{{ $laporan->email }}</td>
                            <td>{{ $laporan->nama_lengkap }}</td>
                            <td>{{ $laporan->tujuan }}</td>
                            <td>{{ $laporan->np1 }}</td>
                            <td>{{ $laporan->np2 }}</td>
                            <td>{{ $laporan->np3 }}</td>
                            <td>{{ $laporan->np4 }}</td>
                            <td>{{ $laporan->np5 }}</td>
                            <td>{{ $laporan->np6 }}</td>
                            <td>{{ $laporan->np7 }}</td>
                            <td>{{ $laporan->np8 }}</td>
                            <td>{{ $laporan->np9 }}</td>
                            <td>{{ $laporan->np10 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- End All Data --}}
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    @if ($laporansPaginate->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $laporansPaginate->previousPageUrl() }}"
                                tabindex="-1">Previous</a>
                        </li>
                    @endif

                    @foreach ($laporansPaginate as $laporan)
                        <li
                            class="page-item {{ $laporansPaginate->currentPage() == $loop->iteration ? 'active' : '' }}">
                            <a class="page-link"
                                href="{{ $laporansPaginate->url($loop->iteration) }}">{{ $loop->iteration }}</a>
                        </li>
                    @endforeach

                    @if ($laporansPaginate->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $laporansPaginate->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="openChoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">X</button>
            </div>
            <div class="modal-body mx-auto">
                <button class="btn btn-sm btn-primary" onclick="exportToCSV_AllData()">Export (All Data)</button>
                <button class="btn btn-sm btn-info" onclick="exportToCSV()">Export (5 Data)</button>
            </div>
        </div>
    </div>
</div>

@include('admin.theme.footer')

{{-- <script>
        function exportToCSV() {
            const rows = document.querySelectorAll("#laporanTable tbody tr");
            const csvContent = [];

            // Header
            const header = Array.from(document.querySelectorAll("#laporanTable thead th"))
                .map(th => th.innerText.trim());
            csvContent.push(header.join(','));

            // Rows
            rows.forEach(row => {
                const rowData = Array.from(row.querySelectorAll("td")).map(td => td.innerText.trim());
                csvContent.push(rowData.join(','));
            });

            // Create CSV file content
            const csvData = csvContent.join('\n');

            // Create a temporary anchor element
            const link = document.createElement('a');
            link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csvData));
            link.setAttribute('download', 'laporan.csv');
            link.style.display = 'none';
            document.body.appendChild(link);

            // Trigger the download
            link.click();

            // Clean up
            document.body.removeChild(link);
        }
    </script> --}}

<script>
    function exportToCSV() {
        const rows = document.querySelectorAll("#laporanTable tbody tr");
        const csvContent = [];

        // Header
        const header = Array.from(document.querySelectorAll("#laporanTable thead th"))
            .map(th => th.innerText.trim());
        csvContent.push(header.join(','));

        rows.forEach(row => {
            const rowData = Array.from(row.querySelectorAll("td")).map(td => td.innerText.trim());
            csvContent.push(rowData.join(','));
        });

        const csvData = csvContent.join('\n');

        const link = document.createElement('a');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csvData));
        link.setAttribute('download', 'laporan.csv');
        link.style.display = 'none';
        document.body.appendChild(link);

        link.click();
        document.body.removeChild(link);
    }
</script>

<script>
    function exportToCSV_AllData() {
        const rows = document.querySelectorAll("#laporanTableAllData tbody tr");
        const csvContent = [];

        // Header
        const header = Array.from(document.querySelectorAll("#laporanTable thead th"))
            .map(th => th.innerText.trim());
        csvContent.push(header.join(','));

        rows.forEach(row => {
            const rowData = Array.from(row.querySelectorAll("td")).map(td => td.innerText.trim());
            csvContent.push(rowData.join(','));
        });

        const csvData = csvContent.join('\n');

        const link = document.createElement('a');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csvData));
        link.setAttribute('download', 'laporan.csv');
        link.style.display = 'none';
        document.body.appendChild(link);

        link.click();
        document.body.removeChild(link);
    }
</script>

</body>

</html>
