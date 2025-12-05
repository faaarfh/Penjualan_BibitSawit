<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h2 class="section-title">Hasil Diagnosis Penyakit</h2>
                </div>

                @if(!empty($penyakit['photo']))
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $penyakit['photo']) }}"
                             alt="{{ $penyakit['nama'] }}"
                             class="img-fluid rounded"
                             style="max-height: 200px; object-fit: cover;">
                    </div>
                @endif

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <div class="card p-3 bg-light">
                            <h5 class="fw-bold text-dark">Kode Penyakit</h5>
                            <p class="text-muted">{{ $penyakit['kode'] ?? 'Tidak ada kode penyakit' }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card p-3 bg-light">
                            <h5 class="fw-bold text-dark">Nama Penyakit</h5>
                            <p class="text-muted">{{ $penyakit['nama'] ?? 'Tidak ada nama penyakit' }}</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card p-3 bg-light">
                            <h5 class="fw-bold text-dark">Probabilitas</h5>
                            <p class="text-muted">{{ sprintf('%.10f', $penyakit['probabilitas']) }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h5 class="fw-bold text-dark">Solusi Penanganan :</h5>
                    <p class="text-muted">{{ $penyakit['solusi'] ?? 'Belum ada solusi tersedia' }}</p>
                </div>

                <div class="text-end">

<a href="{{ route('diagnosis')}}" class="btn btn-success"
        style="background-color: #212529; border: none; outline: none; box-shadow: none;">
  Ulangi Diagnosis
</a>
                </div>
            </div>
        </div>
    </div>
</div>
