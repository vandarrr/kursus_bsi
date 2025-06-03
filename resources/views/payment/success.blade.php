<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Pembayaran Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5 text-center">
        <h1 class="text-success">Pembayaran Berhasil!</h1>
        <p>Terima kasih telah melakukan pembayaran kursus.</p>

        <a href="{{ url('/') }}" class="btn btn-primary me-2">Kembali ke Beranda</a>
        <a href="{{ route('user') }}" class="btn btn-outline-primary">Kembali ke Menu User</a>
    </div>
</body>
</html>
