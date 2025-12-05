<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h2 class="section-title">Diagnosis Penyakit</h2>
                </div>
                <form wire:submit.prevent="diagnosis">
<div class="mb-4">
    <p class="text-muted">Pilih gejala penyakit sesuai dengan yang dialami hewan ternak anda</p>

    @if($daftarGejalaKiri->isEmpty())
        <div class="alert alert-warning text-center">
            Belum ada gejala yang tersedia.
        </div>
    @else
        <div class="row">
            <div class="col-6">
                @foreach ($daftarGejalaKiri as $gejala)
                    <div class="form-check">
                        <input type="checkbox" id="gejala{{ $gejala->id }}" wire:model="gejalaDipilih" value="{{ $gejala->id }}" class="form-check-input">
                        <label for="gejala{{ $gejala->id }}" class="form-check-label"> {{ $gejala->nomor }}. {{ $gejala->nama }}</label>
                    </div>
                @endforeach
            </div>

            <div class="col-6">
                @foreach ($daftarGejalaKanan as $gejala)
                    <div class="form-check">
                        <input type="checkbox" id="gejala{{ $gejala->id }}" wire:model="gejalaDipilih" value="{{ $gejala->id }}" class="form-check-input">
                        <label for="gejala{{ $gejala->id }}" class="form-check-label"> {{ $gejala->nomor }}. {{ $gejala->nama }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success" {{ $daftarGejalaKiri->isEmpty() ? 'disabled' : '' }}>
                            Konsultasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
