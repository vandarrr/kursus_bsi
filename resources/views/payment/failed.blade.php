<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Pembayaran Gagal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5 text-center">
        <h1 class="text-danger">Pembayaran Gagal</h1>
        <p>Maaf, pembayaran Anda gagal. Silakan coba lagi.</p>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Coba Lagi</a>
    </div>
</body>
</html>
