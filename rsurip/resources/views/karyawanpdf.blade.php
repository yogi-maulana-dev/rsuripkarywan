<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Laporan PDF Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            margin: 20px auto;
            /* Memposisikan tabel di tengah */
            width: 80%;
            /* Mengatur lebar tabel */
        }

        table tr td,
        table tr th {
            font-size: 9pt;
        }

        h5 {
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            /* Menambahkan border pada tabel */
        }
    </style>
</head>

<body>
    <center>
        <h5>Membuat Laporan PDF Dengan DOMPDF Karyawan RS Urip</h5>
    </center>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Gaji</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tgl_lahir }}</td>
                    <td>{{ $item->gaji }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
