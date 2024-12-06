<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Pengajuan</title>
</head>
<body>
    <h2>Notifikasi Pengajuan</h2>
    <p><strong>Judul:</strong> {{ $notifikasi->judul }}</p>
    <p><strong>Deskripsi:</strong> {{ $notifikasi->deskripsi }}</p>
    <p><strong>Status:</strong> {{ $notifikasi->status }}</p>
    <p><strong>Tujuan Pengajuan:</strong> {{ $pengajuan->pilih_tujuan }}</p>
    <p><strong>Jenis Pengajuan:</strong> {{ $pengajuan->jenis_pengajuan }}</p>
</body>
</html>
