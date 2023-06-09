<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan</title>
    <style>
        h3 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18pt;
        }

        h4 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14pt;
        }

        table {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12pt;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

</head>

<body>
    <h3 class="text-center">LAPORAN PENDAPATAN</h3>
    <h4 class="text-center">
        Tanggal {{ tanggal_indo($awal, false) }}
        s/d
        Tanggal {{ tanggal_indo($akhir, false) }}
    </h4>

    <table border="1" cellpadding="5" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Tanggal</th>
                <th>Penjualan</th>
                <th>Pembelian</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    @foreach ($row as $col)
                        <td>{{ $col }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
