<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi {{$request->start_date}} - {{$request->end_date}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Transaksi Inventory </h4>
            <!-- <h6> Sistem Informasi Monitoring Material --> <a target="_blank" href="#"></a></h5>
    </center>
    @if(count($data['masuk']) > 0)
    <center>
        <h5>Transaksi Masuk</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Item</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Pemasok</th>
                <th scope="col">Grand Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['masuk'] as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item['keterangan']}}</td>
                <td><?php echo $item['item'] ?></td>
                <td>{{$item['tanggal']}}</td>
                <td>{{$item['qty']}}</td>
                <td>{{$item['nama_pemasok']}}</td>
                <td>{{$item['grandtotal']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @if(count($data['keluar']) > 0)
    <center>
        <h5>Transaksi Keluar</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Penanggung Jawab</th>
                <th scope="col">Grand Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['keluar'] as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item['keterangan']}}</td>
                <td>{{$item['tanggal']}}</td>
                <td>{{$item['qty']}}</td>
                <td>{{$item['nama_pengguna']}}</td>
                <td>{{$item['grandtotal']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</body>

</html>