

<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>HTML Table</h2>

<table>
    <tr>
        <th>Nom du master</th>
        <th>type</th>
        <th>detail</th>
    </tr>
    @foreach($co_master as $co)
        <tr>
            <td>{{$co->title}}</td>
            <td>{{$co->type}}</td>
            <td>{{$co->detail}}</td>
        </tr>

    @endforeach


</table>

</body>
</html>

