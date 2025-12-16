@php
    use App\Enums\StatusPesanan;
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pembelian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }
        .bukti-box {
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,.08);
        }
        .bukti-header {
            border-bottom: 2px dashed #dee2e6;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .bukti-footer {
            border-top: 2px dashed #dee2e6;
            margin-top: 20px;
            padding-top: 10px;
            font-size: 14px;
            color: #6c757d;
        }
        @media print {
            .no-print {
                display: none;
            }
            body {
                background: white;
            }
        }
    </style>
</head>
<body>

<div class="bukti-box">

    <!-- Header -->
    <div class="bukti-header text-center">
        <h4 class="mb-0">BUKTI PEMBELIAN</h4>
        <small class="text-muted">Sistem Penjualan Bibit</small>
    </div>

    <!-- Informasi Pesanan -->
    <table class="table table-borderless mb-3">
        <tr>
            <td width="40%">Nama Pembeli</td>
            <td width="5%">:</td>
            <td>{{ $pesanan->user->name }}</td>
        </tr>
        <tr>
            <td>Tanggal Pesan</td>
            <td>:</td>
            <td>{{ $pesanan->tanggal_pesan }}</td>
        </tr>
        <tr>
            <td>Tanggal Bayar</td>
            <td>:</td>
            <td>{{ $pesanan->tanggal_bayar ? $pesanan->tanggal_bayar : '-' }}</td>
        </tr>
        <tr>
            <td>Metode Pembayaran</td>
            <td>:</td>
            <td>{{ $pesanan->metode_pembayaran }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>
                <span class="badge
                    {{ $pesanan->status === StatusPesanan::DITOLAK ? 'bg-danger' : 'bg-success' }}">
                    {{ $pesanan->status }}
                </span>
            </td>
        </tr>
    </table>

    <!-- Detail Harga -->
    <div class="border rounded p-3 mb-3">
        <div class="d-flex justify-content-between">
            <span>Total Harga</span>
            <strong>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong>
        </div>
    </div>

    <!-- Keterangan Penolakan (jika ada) -->
    @if (!empty($pesanan->keterangan))
        <div class="alert alert-danger">
            <strong>Keterangan:</strong><br>
            {{ $pesanan->keterangan }}
        </div>
    @endif

    <!-- Footer -->
    <div class="bukti-footer text-center">
        Bukti ini sah dan diproses secara sistem.<br>
        Dicetak pada {{ now()->format('d-m-Y H:i') }}
    </div>

    <!-- Button -->
    <div class="text-center mt-3 no-print">
        <button onclick="window.print()" class="btn btn-primary">
            Cetak Bukti
        </button>
    </div>

</div>

</body>
</html>
