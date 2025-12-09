@php
  use App\Enums\Role;

  $role = auth()->user()->role;
@endphp

<div class="row">
    @if ($role === Role::ADMIN)

    <!-- Total Pemasukan -->
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon green mb-2">
                            <i class="iconly-boldWallet"></i> <!-- Ikon pemasukan -->
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Transaksi Bulanan</h6>
                        <h6 class="font-extrabold mb-0">{{ $totalTransaksiBulanan ?? '' }} Transaksi</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pengeluaran -->
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon red mb-2">
                            <i class="iconly-boldPaper"></i> <!-- Ikon pengeluaran -->
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Pendapatan Bulanan</h6>
                        <h6 class="font-extrabold mb-0">Rp {{ number_format($totalPendapatanBulanan,0,',','.') }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif
</div>
