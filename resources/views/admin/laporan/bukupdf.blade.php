<!DOCTYPE html>
<html>

<head>
    <title>Laporan Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <table class="table table-bordered" width="100%" align="center">
        <tr align="center">
            <td>
                <h3>Laporan Data Buku<br>Perpusline SMANCA</h3>
                <hr>
            </td>
        </tr>
    </table>
    <table class="table table-bordered" width="100%" align="center">
        <thead>
            <tr>
                <th width="3%">No</th>
                <th width="5%">Kode Buku</th>
                <th width="15%">Judul</th>
                <th width="5%">Penulis</th>
                <th width="5%">Penerbit</th>
                <th width="5%">Kategori</th>
                <th width="5%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($buku as $bku)
                <tr align="center">
                    <td>{{ $i++ }}</td>
                    <td>{{ $bku->kd_buku }}</td>
                    <td>{{ $bku->judul }}</td>
                    <td>{{ $bku->penulis }}</td>
                    <td>{{ $bku->penerbit }}</td>
                    <td>{{ $bku->kategori }}</td>
                    <td>{{ $bku->stok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div align="right">
        <h6>Tanda Tangan</h6><br>
        <h6>{{ Auth::user()->name }}</h6>
    </div>
</body>

</html>
