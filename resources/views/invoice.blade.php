<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>

</head>

<body>
    <?php
    //change to base64
    $path = public_path('img/' . $site->logo);
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
    @php
        if ($transaksi->status == 0) {
            $text = 'Menunggu pembayaran';
            $color = 'blue';
            $icon = 'far fa-clock';
        } elseif ($transaksi->status == 1) {
            $text = 'Pembayaran berhasil';
            $color = 'green';
            $icon = 'far fa-check-circle';
        } elseif ($transaksi->status == 2) {
            $text = 'Sedang diproses';
            $color = 'yellow';
            $icon = 'far fa-clock';
        } elseif ($transaksi->status == 3) {
            $text = 'Pembayaran dibatalkan';
            $color = 'red';
            $icon = 'far fa-times-circle';
        }
    @endphp
    <table width="100%">
        <tr>
            <td valign="top">
                <img src="{{ $base64 }}" alt="" width="80" />
            </td>
            <td align="right">
                <h3>{{ $site->name }}</h3>
                <pre>
                {{ $site->name }}
                {{ $site->address }}
                {{ $site->phone }}
                <h3>STATUS : <span style="background-color: {{ $color }};padding:5px">{{ $text }}</span></h3>
            </pre>
            </td>
        </tr>

    </table>

    <table width="100%">
        <tr>
            <td><strong>From:</strong> {{ $site->name }} - {{ $site->phone }}</td>
            <td><strong>To:</strong> {{ $transaksi->nama }} - {{ $transaksi->no_hp }}</td>
        </tr>

    </table>

    <br />

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{ $transaksi->product_name }}</td>
                <td align="right">1</td>
                <td align="right">@currency($transaksi->product_price)</td>
                <td align="right">@currency($transaksi->product_price)</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td align="right">Total</td>
                <td align="right" class="gray">@currency($transaksi->product_price)</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
