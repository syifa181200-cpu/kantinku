<!-- CSS Khusus Printer Thermal Kasir POS (frontend/petugas/nota.php) -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Kasir - POS KantinKu</title>
    <style>
        @media print {
            @page { size: 80mm auto; margin: 0; }
            body { width: 76mm; margin: 2mm auto; font-family: 'Courier New', Courier, monospace; font-size: 9pt; }
            .no-print { display: none !important; }
        }
        body { width: 76mm; margin: 20px auto; font-family: 'Courier New', Courier, monospace; font-size: 9pt; color: #000; }
        .receipt-card { border: 1px dashed #333; padding: 10px; }
        .text-center { text-align: center; }
        .divider { border-top: 1px dashed #000; margin: 6px 0; }
        .item-row { display: flex; justify-content: space-between; margin-bottom: 3px; }
    </style>
</head>
<body onload="window.print()">
    <div class="receipt-card">
        <div class="text-center">
            <h3 style="margin: 0; font-size: 13pt;">KANTINKU DIGITAL</h3>
            <p style="margin: 2px 0;">Struk Resmi Transaksi</p>
        </div>
        <div class="divider"></div>
        <div>No: <strong>KTK-20260901-001</strong></div>
        <div class="divider"></div>
        <div class="item-row">
            <span>Nasi Goreng (x1)</span>
            <span>Rp 15.000</span>
        </div>
        <div class="divider"></div>
        <div class="item-row" style="font-weight: bold;">
            <span>TOTAL:</span>
            <span>Rp 15.000</span>
        </div>
    </div>
</body>
</html>