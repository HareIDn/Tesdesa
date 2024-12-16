<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $body }}</p>

    <h3>Notifikasi Detail:</h3>
    <ul>
        <li>Judul: {{ $notifikasi['judul'] }}</li>
        <li>Deskripsi: {{ $notifikasi['deskripsi'] }}</li>
        <li>Status: {{ $notifikasi['status'] }}</li>
    </ul>
</body>
</html>
