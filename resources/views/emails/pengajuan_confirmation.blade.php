<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['title'] }}</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>

    <h3>Detail Notifikasi:</h3>
    <ul>
        <li><strong>Judul:</strong> {{ $details['notifikasi']['judul'] }}</li>
        <li><strong>Deskripsi:</strong> {{ $details['notifikasi']['deskripsi'] }}</li>
        <li><strong>Status:</strong> {{ $details['notifikasi']['status'] }}</li>
        <li><strong>Dibuat pada:</strong> {{ $details['notifikasi']['created_at'] }}</li>
    </ul>

    <p>Terima kasih!</p>
</body>
</html>
