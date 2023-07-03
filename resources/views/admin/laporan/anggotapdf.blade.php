<!DOCTYPE html>
<html>

<head>
    <title>Laporan Anggota</title>
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
                <h3>Laporan Data Anggota<br>Perpusline SMANCA</h3>
                <hr>
            </td>
        </tr>
    </table>
    <table class="table table-bordered" width="100%" align="center">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Nama</th>
                <th width="5%">Kelas</th>
                <th width="5%">Jenis Kelamin</th>
                <th width="5%">No Hp</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($anggota as $agt)
                <tr align="center">
                    <td>{{ $i++ }}</td>
                    <td>{{ $agt->nama }}</td>
                    <td>{{ $agt->kelas }}</td>
                    <td>{{ $agt->jenis_kelamin }}</td>
                    <td>{{ $agt->no_hp }}</td>
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