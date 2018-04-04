<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Currency</title>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
</head>
<body>
<div>
    <table>
        <tr>
            <th>Name</th>
            <th>Volume</th>
            <th>Amount</th>
        </tr>
        @foreach($data['stock'] as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['volume'] }}</td>
                <td>{{ $item['price']['amount'] }}</td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
