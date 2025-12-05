<div>

    <!-- Modal Add Form -->
    <div class="modal fade" id="modal-add" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input wire:model="form.nama_siswa" type="text" class="form-control" id="nama_siswa">
                        @error('form.nama_siswa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" wire:click="save" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Form -->
    <div class="modal fade" id="modal-detail" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <fieldset disabled>
                        <div class="form-group mb-3">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input wire:model="form.nama_siswa" type="text" class="form-control" id="nama_siswa">
                            @error('form.nama_siswa')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </fieldset>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Detail Form -->
    <div class="modal fade" id="modal-edit" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Perbarui Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input wire:model="form.nama_siswa" type="text" class="form-control" id="nama_siswa">
                        @error('form.nama_siswa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" wire:click="update" class="btn btn-warning">
                        Perbarui
                    </button>
                </div>

            </div>
        </div>
    </div>

<div class="row">
    <!-- KIRI: Daftar Kelas + Tombol Pilih -->
    <div class="col-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0">Pilih Kelas</h5>
            </div>
            <div class="card-body p-0">
                @if($this->kelasList->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($this->kelasList as $kelas)
                            <button
                                wire:click="pilihKelas({{ $kelas->id }})"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center
                                    {{ $selectedKelasId == $kelas->id ? 'active' : '' }}">
                                <div>
                                    <strong>{{ $kelas->nama_kelas }}</strong>
                                </div>
                                <span class="badge bg-light text-dark rounded-pill">
                                    {{ $kelas->siswa_count ?? 0 }} siswa
                                </span>
                            </button>
                        @endforeach
                    </div>
                @else
                    <div class="p-4 text-center text-muted">
                        <em>Tidak ada kelas tersedia.</em>
                    </div>
                @endif
            </div>

            <!-- Tombol Semua Kelas -->
            <div class="card-footer">
                <button
                    wire:click="pilihKelas(null)"
                    class="btn btn-outline-secondary btn-sm w-100
                        {{ is_null($selectedKelasId) ? 'btn-primary' : '' }}">
                    <i class="bi bi-list-ul"></i>
                    {{ is_null($selectedKelasId) ? 'Semua Kelas (Dipilih)' : 'Tampilkan Semua Kelas' }}
                </button>
            </div>
        </div>
    </div>

    <!-- KANAN: Tabel Siswa (yang udah kamu punya) -->
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                            @isset($selectedKelasId)
                        <button class="btn btn-primary" wire:click="add">
                            <i class="bi bi-plus-lg"></i> Tambah Siswa
                        </button>

                            @endisset
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" wire:model.live.debounce.300ms="search" class="form-control"
                                placeholder="Cari Siswa...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @if($selectedKelasId)
                    <div class="alert alert-info mb-3 py-2">
                        <i class="bi bi-info-circle"></i>
                        Menampilkan siswa kelas: <strong>{{ $this->kelasList->where('id', $selectedKelasId)->first()->nama_kelas ?? '-' }}</strong>
                    </div>
                @endif

                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->siswaList as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-info" wire:click="detail({{ $item->id }})">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" wire:click="edit({{ $item->id }})">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $item->id }})">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <em>
                                        @if($selectedKelasId)
                                            Belum ada siswa di kelas ini.
                                        @else
                                            Tidak ada data siswa.
                                        @endif
                                    </em>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $this->siswaList->links() }}


            </div>
        </div>
    </div>
</div>
</div>
