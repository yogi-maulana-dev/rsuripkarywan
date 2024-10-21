<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RS Urip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- jQuery 3.7.1 -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- Bootstrap 5.3.0 Bundle (includes Popper.js) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables 2.1.8 -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <!-- DataTables Bootstrap 5 Integration -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">RS Urip</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/karyawan">Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tlog">Tlog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Selamat Datang Di Website Gaji RS Urip</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="/karyawan_create" class="btn btn-info right" role="button">Tambah Karyawan</a>

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $karyawans)
                    <tr>
                        <td>{{ $karyawans->nama }}</td>
                        <td>{{ $karyawans->tgl_lahir }}</td>
                        <td>{{ $karyawans->gaji }}</td>
                        <td> <a href="{{ route('karyawan.edit', $karyawans->id) }}"
                                class="btn btn-warning btn-sm">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Gaji</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- jQuery 3.7.1 -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- Bootstrap 5.3.0 Bundle (includes Popper.js) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables 2.1.8 -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <!-- DataTables Bootstrap 5 Integration -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>
