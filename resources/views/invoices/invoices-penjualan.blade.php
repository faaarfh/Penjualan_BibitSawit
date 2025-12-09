<x-laporan>
<div class="report-container mt-4">

    <h2 class="report-title mb-2 text-center">📊 Laporan Penjualan</h2>

    <!-- TANGGAL LAPORAN DICETAK -->
    <p class="text-center mb-4" id="tanggal-cetak" style="color:#555; font-size:14px;">
        <!-- Diisi otomatis oleh JS -->
    </p>

    <!-- PENJUALAN HARI INI -->
    <div class="report-card mb-4">
        <div class="report-header">
            Penjualan Hari Ini <span id="tanggal-hari-ini" style="font-weight:400;"></span>
        </div>
        <div class="report-body">
            <div class="report-item"><strong>Total Transaksi:</strong> {{ $totalTransaksiHariIni }} pesanan</div>
            <div class="report-item"><strong>Total Pendapatan:</strong> Rp {{ number_format($totalPendapatanHariIni,0,',','.') }}</div>
        </div>
    </div>

    <!-- PENJUALAN BULANAN -->
    <div class="report-card mb-4">
        <div class="report-header">
            Penjualan Bulan Ini <span id="tanggal-bulan-ini" style="font-weight:400;"></span>
        </div>
        <div class="report-body">
            <div class="report-item"><strong>Total Transaksi:</strong> {{ $totalTransaksiBulanan }} pesanan</div>
            <div class="report-item"><strong>Total Pendapatan:</strong> Rp {{ number_format($totalPendapatanBulanan,0,',','.') }}</div>
            <div class="report-item"><strong>Rata-rata Penjualan Harian:</strong> {{ $rataRataHarian }} pesanan</div>
        </div>
    </div>

    <!-- GRAFIK PENJUALAN PER JENIS BIBIT -->
    <div class="report-card mb-4">
        <div class="report-header">Grafik Penjualan Per Jenis Bibit</div>
        <div class="report-body">
            <div id="chart-jenis-bibit"></div>
        </div>
    </div>

</div>

<style>
    .report-container {
        max-width: 800px;
        margin: auto;
    }

    .report-title {
        font-weight: 700;
        letter-spacing: 0.5px;
        color: #2c3e50;
    }

    .report-card {
        border-radius: 12px;
        border: 1px solid #ddd;
        background: #fafafa;
        box-shadow: 0 2px 4px rgba(0,0,0,0.06);
        margin-bottom: 10px;
    }

    .report-header {
        padding: 14px 18px;
        background: #f0f4f7;
        border-bottom: 1px solid #e3e6e9;
        font-weight: 600;
        color: #34495e;
        border-radius: 12px 12px 0 0;
    }

    .report-body {
        padding: 16px 20px;
    }

    .report-item {
        margin-bottom: 6px;
    }

    @media print {
        body { background: #fff !important; }
        .report-card {
            box-shadow: none !important;
            background: #fff !important;
        }
        .report-header {
            background: #f2f2f2 !important;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var chartData = @json($grafikBibit);
    console.log("Data Grafik:", chartData);
    if (!chartData || chartData.length === 0) {
        document.querySelector("#chart-jenis-bibit").innerHTML =
            "<p class='text-center mt-3 text-muted'>Tidak ada data grafik tersedia.</p>";
        return;
    }
    // === Build chart ===
    var options = {
        chart: {
            type: 'bar',
            height: 350
        },
        series: [{
            name: 'Jumlah Terjual',
            data: chartData.map(item => item.total)
        }],
        xaxis: {
            categories: chartData.map(item => item.nama_bibit),  // <-- Ubah ini dari item.nama jadi item.nama_bibit
            title: {
                text: 'Jenis Bibit'
            }
        },
        colors: ['#3498db'],
        plotOptions: {
            bar: {
                borderRadius: 6,
                horizontal: false,
                columnWidth: '55%'
            }
        },
        dataLabels: {
            enabled: true
        }
    };
    var chart = new ApexCharts(
        document.querySelector("#chart-jenis-bibit"),
        options
    );
    chart.render();
});
</script>

<!-- TANGGAL LENGKAP -->
<script>
    const bulan = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    const hari = [
        "Minggu", "Senin", "Selasa", "Rabu",
        "Kamis", "Jumat", "Sabtu"
    ];

    const t = new Date();

    const tanggalLengkap =
        `${hari[t.getDay()]}, ${t.getDate()} ${bulan[t.getMonth()]} ${t.getFullYear()}`;

    const bulanLengkap =
        `${bulan[t.getMonth()]} ${t.getFullYear()}`;

    // Masukkan ke halaman
    document.getElementById("tanggal-cetak").textContent =
        `Laporan dicetak pada: ${tanggalLengkap}`;

    document.getElementById("tanggal-hari-ini").textContent =
        `(${tanggalLengkap})`;

    document.getElementById("tanggal-bulan-ini").textContent =
        `(${bulanLengkap})`;
</script>

</x-laporan>
