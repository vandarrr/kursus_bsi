<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pembayaran Kursus</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Midtrans Snap JS -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .payment-container {
            max-width: 480px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgb(0 0 0 / 0.1);
        }
        .btn-pay {
            width: 100%;
            font-size: 1.2rem;
            padding: 12px;
        }
        h1 {
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            color: #343a40;
        }
    </style>
</head>
<body>

<div class="payment-container">
    <h1>Pembayaran Kursus</h1>

    <!-- Informasi pembayaran -->
    <div class="mb-4">
        <p>Silakan klik tombol bayar untuk melanjutkan proses pembayaran kursus Anda.</p>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Nama Kursus</span>
                <strong>{{ $courseName ?? 'Kursus Pemrograman' }}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Total Harga</span>
                <strong>Rp {{ number_format($price ?? 100000, 0, ',', '.') }}</strong>
            </li>
        </ul>
    </div>

    <button id="pay-button" class="btn btn-primary btn-pay">Bayar Sekarang</button>
</div>

<script>
    var payButton = document.getElementById('pay-button');
payButton.addEventListener('click', function () {
    snap.pay('{{ $snapToken }}', {
        onSuccess: function(result) {
            alert("Pembayaran Berhasil!");
            console.log(result);
            window.location.href = "{{ route('payment.success') }}";
        },
        onPending: function(result) {
            alert("Menunggu pembayaran.");
            console.log(result);
            window.location.href = "{{ route('payment.pending') }}";
        },
        onError: function(result) {
            alert("Pembayaran gagal.");
            console.log(result);
            window.location.href = "{{ route('payment.failed') }}";
        },
        onClose: function() {
            alert('Kamu menutup popup tanpa menyelesaikan pembayaran');
        }
    });
});

</script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>