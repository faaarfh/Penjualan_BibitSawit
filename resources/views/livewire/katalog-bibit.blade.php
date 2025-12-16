<div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Cari bibit..."
               wire:model.live="search">
    </div>

    <div class="row">
        @forelse ($this->bibitList as $item)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden;">

                    <img src="{{ $item->gambar }}"
                         class="card-img-top"
                         style="height: 180px; object-fit: cover;">

                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item->nama_bibit }}</h5>

                        <p class="mb-1"><strong>Harga:</strong> Rp {{ number_format($item->harga) }}</p>
                        <p class="mb-1"><strong>Stok:</strong> {{ $item->stok }}</p>

                        <div class="d-flex gap-2 mt-3">
                            <button class="btn btn-outline-primary w-50"
                                wire:click="showDetail({{ $item->id }})">
                                Detail
                            </button>

                            <button class="btn btn-primary w-50"
                                wire:click="beli({{ $item->id }})">
                                Beli
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted mt-4">
                Tidak ada bibit ditemukan.
            </div>
        @endforelse
    </div>

{{-- ========================= --}}
{{--        MODAL BELI         --}}
{{-- ========================= --}}
<div wire:ignore.self class="modal fade" id="modalBeliBibit" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content" style="border-radius: 15px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    Beli {{ $orderBibit?->nama_bibit }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                @if ($orderBibit)
                    <p><strong>Harga Satuan:</strong> Rp {{ number_format($orderBibit->harga) }}</p>
                    <p><strong>Stok:</strong> {{ $orderBibit->stok }}</p>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-bold">Jumlah</span>

                        <div class="input-group" style="width: 140px;">
                            <button class="btn btn-outline-secondary"
                                    wire:click="kurangQty">
                                –
                            </button>

                            <input type="text" class="form-control text-center"
                                   wire:model.live="qty" readonly>

                            <button class="btn btn-outline-secondary"
                                    wire:click="tambahQty">
                                +
                            </button>
                        </div>
                    </div>

                    <h5 class="text-primary fw-bold">
                        Total: Rp {{ number_format($orderTotal) }}
                    </h5>
                @endif

            </div>

            <div class="modal-footer">
                <button class="btn btn-primary"
                        wire:click="masukkanKeranjang">
                    Pesan
                </button>

                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

    {{-- ========================= --}}
    {{--         MODAL DETAIL      --}}
    {{-- ========================= --}}
    <div wire:ignore.self class="modal fade" id="modalDetailBibit" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="border-radius: 15px;">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">
                        {{ $selectedBibit?->nama_bibit }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    @if ($selectedBibit)
                        <!-- <img src="https://via.placeholder.com/600x300?text=Bibit" -->
                        <!--      class="img-fluid mb-3" -->
                        <!--      style="border-radius: 10px; object-fit: cover;"> -->

                        <p><strong>Harga:</strong> Rp {{ number_format($selectedBibit->harga) }}</p>
                        <p><strong>Stok:</strong> {{ $selectedBibit->stok }}</p>

                        <p class="mt-3">
                            {{ $selectedBibit->deskripsi ?? 'Tidak ada deskripsi.' }}
                        </p>
                    @endif
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
