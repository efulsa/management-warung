<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        .text-nowrap{
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <?php
    $pursSplit = $user->chunk(round($user->count() / 2));
    ?>
    <h3>{{ date('l, D F Y')}}</h3>
    <table width="100%">
        <tr>
            <td>
                <table width="90%" border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Pinjaman</th>
                        <th>Status</th>
                    </tr>
                    @foreach($pursSplit[0] as $pur)
                    <tr>
                        <td width="8%">{{ $no++ }}</td>
                        <td class="text-nowrap">{{ $pur->name }}</td>
                        @if(!empty($pur->borrow->first()->saldo))
                        <td>Rp. {{ number_format($pur->borrow->first()->saldo) }}</td>
                        @else
                        <td></td>
                        @endif
                        <td> ... </td>
                    </tr>
                    @endforeach
                </table>
            </td>
            <td style="vertical-align:top;">
                <table width="100%" border="1" cellpadding="0" cellspacing="0">
                    @foreach($pursSplit[1] as $pur)
                    <tr>
                        <td width="10%">{{ $no++ }}</td>
                        <td width="40%" class="text-nowrap">{{ $pur->name }}</td>
                        @if(!empty($pur->borrow->first()->saldo))
                        <td width="35%">Rp. {{ number_format($pur->borrow->first()->saldo) }}</td>
                        @else
                        <td></td>
                        @endif
                        <td width="25%"> ... </td>
                    </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
