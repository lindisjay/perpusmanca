<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
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
                <h4>Laporan Transaksi<br>Perpusline SMANCA</h4>
                <hr>
            </td>
        </tr>
    </table>
    <table class="table table-bordered" width="100%" align="center">
        <thead>
            <tr>
                <th width="2%">No</th>
                <th width="7%">Nama</th>
                <th width="5%">Kelas</th>
                <th width="5%">Tanggal Pinjam</th>
                <th width="5%">Tanggal Kembali</th>
                <th width="5%">Kode Buku</th>
                <th width="7%">Judul</th>
                <th width="2%">Qty</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($transaksi as $trs)
                <tr align="center">
                    <td>{{ $i++ }}</td>
                    <td>{{ $trs->name }}</td>
                    <td>{{ $trs->kelas }}</td>
                    <td>{{ \Carbon\Carbon::parse($trs->created_at)->format('d-m-Y') }}</td>
                    <td>{{ $trs->tgl_kembali }}</td>
                    <td>{{ $trs->kd_buku }}</td>
                    <td>{{ $trs->judul_buku }}</td>
                    <td>{{ $trs->qty_pinjam }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div align="right">
        <h6>Tanda Tangan</h6><br>
        @auth
            <h6>{{ Auth::user()->name }}</h6>
        @endauth
    </div>
</body>

</html>
