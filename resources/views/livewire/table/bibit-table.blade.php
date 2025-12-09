<div>
    <h1>Bibit Table</h1>


<!-- Modal Add Form -->
<div class="modal fade" id="modal-add" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Bibit</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                    <div class="form-group mb-3">
    <label for="nama_bibit">Nama Bibit</label>
    <input wire:model="form.nama_bibit" type="text" class="form-control" id="nama_bibit">
    @error('form.nama_bibit')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="deskripsi">Deskripsi</label>
    <input wire:model="form.deskripsi" type="text" class="form-control" id="deskripsi">
    @error('form.deskripsi')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="stok">Stok</label>
    <input wire:model="form.stok" type="text" class="form-control" id="stok">
    @error('form.stok')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="harga">Harga</label>
    <input wire:model="form.harga" type="number" class="form-control" id="harga">
    @error('form.harga')
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
                <h5 class="modal-title">Detail Bibit</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                  <fieldset disabled>
                    <div class="form-group mb-3">
    <label for="nama_bibit">Nama Bibit</label>
    <input wire:model="form.nama_bibit" type="text" class="form-control" id="nama_bibit">
    @error('form.nama_bibit')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="deskripsi">Deskripsi</label>
    <input wire:model="form.deskripsi" type="text" class="form-control" id="deskripsi">
    @error('form.deskripsi')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="stok">Stok</label>
    <input wire:model="form.stok" type="text" class="form-control" id="stok">
    @error('form.stok')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="harga">Harga</label>
    <input wire:model="form.harga" type="number" class="form-control" id="harga">
    @error('form.harga')
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
                <h5 class="modal-title">Perbarui Bibit</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                    <div class="form-group mb-3">
    <label for="nama_bibit">Nama Bibit</label>
    <input wire:model="form.nama_bibit" type="text" class="form-control" id="nama_bibit">
    @error('form.nama_bibit')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="deskripsi">Deskripsi</label>
    <input wire:model="form.deskripsi" type="text" class="form-control" id="deskripsi">
    @error('form.deskripsi')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="stok">Stok</label>
    <input wire:model="form.stok" type="text" class="form-control" id="stok">
    @error('form.stok')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="harga">Harga</label>
    <input wire:model="form.harga" type="number" class="form-control" id="harga">
    @error('form.harga')
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
<div class="modal fade" id="modal-detail" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Bibit</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="save">
                  <fieldset disabled>
                    <div class="form-group mb-3">
    <label for="nama_bibit">Nama Bibit</label>
    <input wire:model="form.nama_bibit" type="text" class="form-control" id="nama_bibit">
    @error('form.nama_bibit')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="deskripsi">Deskripsi</label>
    <input wire:model="form.deskripsi" type="text" class="form-control" id="deskripsi">
    @error('form.deskripsi')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="stok">Stok</label>
    <input wire:model="form.stok" type="text" class="form-control" id="stok">
    @error('form.stok')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="harga">Harga</label>
    <input wire:model="form.harga" type="number" class="form-control" id="harga">
    @error('form.harga')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
  </fieldset>
                </form>
            </div>

        </div>
    </div>
</div>

    <div class="card">

        <div class="card-header">

            <div class="row">
                <div class="col-6">
                    <button class="btn   btn-primary" wire:click="add">Tambah Bibit</button>
                </div>
                <div class="col-6">

                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" wire:model.live="search" class="form-control" placeholder="Cari Bibit...">
                </div>
                </div>
            </div>

        </div>


        <div class="card-body">

            <table class="table table-bordered align-middle">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Bibit</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Stok</th>
      <th scope="col">Harga</th>
      <th class="text-end">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($this->bibitList as $item)
    <tr>
      <th scope="row">{{ $loop->index + $this->bibitList->firstItem() }}</th>
      <td>{{ $item->nama_bibit }}</td>
      <td>{{ $item->deskripsi }}</td>
      <td>{{ $item->stok }}</td>
      <td>{{ $item->label_harga }}</td>
  <td class="text-end">
      <button type="button" class="btn   btn-info" wire:click="detail({{ $item->id }})">
        <i class="bi bi-eye"></i> Detail
      </button>
      <button type="button" class="btn   btn-warning" wire:click="edit({{ $item->id }})">
        <i class="bi bi-pencil"></i> Edit
      </button>
      <button type="button" class="btn   btn-danger" wire:click="delete({{ $item->id }})">
        <i class="bi bi-trash"></i> Hapus
      </button>
  </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center text-muted py-3">
        <em>Tidak ada data tersedia.</em>
    </td>
</tr>
@endforelse
  </tbody>
</table>
        </div>

        <div class="card-footer">

    {{ $this->bibitList->links()}}
        </div>


    </div>
</div>
