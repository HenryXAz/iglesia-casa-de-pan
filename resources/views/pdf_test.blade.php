<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h1>PDF TEST</h1>

    <table>
        <tbody>
        @foreach($numbers as $number)
            <tr>
                <td>{{$number}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
