<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Kursus</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>
<body>
    <h1>Pembayaran Kursus</h1>
    <button id="pay-button">Bayar Sekarang</button>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert("Pembayaran Berhasil!");
                    console.log(result);
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran.");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Pembayaran gagal.");
                    console.log(result);
                },
                onClose: function() {
                    alert('Kamu menutup popup tanpa menyelesaikan pembayaran');
                }
            });
        });
    </script>
</body>
</html>