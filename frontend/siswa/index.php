<!-- Form Modal Checkout (frontend/siswa/index.php) -->
<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-3 border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-dark">Pilih Cara Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="index.php" method="POST" id="checkout-form">
                <div class="modal-body">
                    <input type="hidden" name="action" value="checkout">
                    <input type="hidden" name="metode_pembayaran" id="hidden-metode-pembayaran" value="tunai">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Metode Pembayaran</label>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-outline-success text-start active btn-payment" data-method="tunai">
                                💵 Tunai di Loket Kantin (Bayar saat Ambil)
                            </button>
                            <button type="button" class="btn btn-outline-success text-start btn-payment" data-method="qris">
                                📱 QRIS Digital (Konfirmasi Otomatis)
                            </button>
                        </div>
                    </div>
                    <div id="cart-form-inputs"></div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="submit" class="btn btn-food-primary w-100 py-2 fw-bold" id="btn-checkout">
                        Konfirmasi & Buat Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Form Modal Checkout (frontend/siswa/index.php) -->
<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-3 border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-dark">Pilih Cara Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="index.php" method="POST" id="checkout-form">
                <div class="modal-body">
                    <input type="hidden" name="action" value="checkout">
                    <input type="hidden" name="metode_pembayaran" id="hidden-metode-pembayaran" value="tunai">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Metode Pembayaran</label>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-outline-success text-start active btn-payment" data-method="tunai">
                                💵 Tunai di Loket Kantin (Bayar saat Ambil)
                            </button>
                            <button type="button" class="btn btn-outline-success text-start btn-payment" data-method="qris">
                                📱 QRIS Digital (Konfirmasi Otomatis)
                            </button>
                        </div>
                    </div>
                    <div id="cart-form-inputs"></div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="submit" class="btn btn-food-primary w-100 py-2 fw-bold" id="btn-checkout">
                        Konfirmasi & Buat Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
