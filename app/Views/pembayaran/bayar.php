<?= $this->extend('layouts/siswa_layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pembayaran SPP Bulan <?= $bulan_name ?></h3> <!-- Gunakan $bulan_name dari controller -->
    </div>
    <div class="card-body">
        <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
        <form id="payment-form" method="post" action="/pembayaran/selesai">
            <input type="hidden" name="pembayaran_id" value="<?= $pembayaran['id'] ?>">
            <input type="hidden" name="order_id">
            <input type="hidden" name="transaction_id">
        </form>
    </div>
</div>

<!-- Midtrans Snap.js -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= getenv('MIDTRANS_CLIENT_KEY') ?>"></script>
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        window.snap.pay('<?= $snapToken ?>', {
            onSuccess: function(result) {
                document.querySelector('input[name="order_id"]').value = result.order_id;
                document.querySelector('input[name="transaction_id"]').value = result.transaction_id;
                document.getElementById('payment-form').submit();
            },
            onPending: function(result) {
                alert("Pembayaran tertunda, silahkan lanjutkan pembayaran melalui notifikasi yang diberikan.");
            },
            onError: function(result) {
                alert("Terjadi kesalahan dalam proses pembayaran.");
            }
        });
    });
</script>
<?= $this->endSection() ?>
