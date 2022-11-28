<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table >
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Date</th>
                <th>Site</th>
                <th>Tanda Tangan</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($absen as $absens)
            <tr style="text-align: center;">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $absens->name}}</td>
                <td>{{ $absens->date}}</td>
                <td>{{ $absens->site ?? 'N/A'}}</td>
                @if ($absens->ttd)
                <td><img src="{{ asset('storage/'. $absens->ttd .'.jpg') }}" alt="" width="30%"></td>
                    @else
                    <td>N/A</td>
                @endif
                <td>{{ $absens->description }}</td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>