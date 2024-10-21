<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Membuat Laporan PDF Dengan DOMPDF Karyawan RS Urip</h4>

    </center>

    <table>
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
