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
                <h4>Laporan Data Anggota<br>Perpusline SMANCA</h4>
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
            @foreach ($users as $user)
                <tr align="center">
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->kelas }}</td>
                    <td>{{ $user->jenis_kelamin }}</td>
                    <td>{{ $user->no_hp }}</td>
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
