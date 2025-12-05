@php

    use App\Enums\Role;

@endphp
<div>

<!-- Modal Add Form -->
<div class="modal fade" id="modal-add" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                    <div class="form-group mb-3">
    <label for="name">Name</label>
    <input wire:model="form.name" type="text" class="form-control" id="name">
    @error('form.name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="email">Email</label>
    <input wire:model="form.email" type="email" class="form-control" id="email">
    @error('form.email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="role">Role</label>
    <select wire:model="form.role" class="form-control" id="role">
        @foreach (Role::values() as $role)
            <option value="{{ $role }}">{{ $role }}</option>
        @endforeach
    </select>

    @error('form.role')
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
                <h5 class="modal-title">Detail User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                  <fieldset disabled>
                    <div class="form-group mb-3">
    <label for="name">Name</label>
    <input wire:model="form.name" type="text" class="form-control" id="name">
    @error('form.name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="email">Email</label>
    <input wire:model="form.email" type="email" class="form-control" id="email">
    @error('form.email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="role">Role</label>
    <input wire:model="form.role" type="text" class="form-control" id="role">
    @error('form.role')
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
                <h5 class="modal-title">Perbarui User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                    <div class="form-group mb-3">
    <label for="name">Name</label>
    <input wire:model="form.name" type="text" class="form-control" id="name">
    @error('form.name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="email">Email</label>
    <input wire:model="form.email" type="email" class="form-control" id="email">
    @error('form.email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="role">Role</label>
    <select wire:model="form.role" class="form-control" id="role">
        @foreach (Role::values() as $role)
            <option value="{{ $role }}">{{ $role }}</option>
        @endforeach
    </select>
    @error('form.role')
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
                <h5 class="modal-title">Detail User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="save">
                  <fieldset disabled>
                    <div class="form-group mb-3">
    <label for="name">Name</label>
    <input wire:model="form.name" type="text" class="form-control" id="name">
    @error('form.name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="email">Email</label>
    <input wire:model="form.email" type="email" class="form-control" id="email">
    @error('form.email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="role">Role</label>
    <input wire:model="form.role" type="text" class="form-control" id="role">
    @error('form.role')
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
                    <button class="btn  btn-primary" wire:click="add">Tambah User</button>
                </div>
                <div class="col-6">

                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" wire:model.live="search" class="form-control" placeholder="Cari User...">
                </div>
                </div>
            </div>

        </div>


        <div class="card-body">

            <table class="table table-bordered align-middle">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th class="text-end">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($this->userList as $item)
    <tr>
      <th scope="row">{{ $loop->index + $this->userList->firstItem() }}</th>
      <td>{{ $item->name }}</td>
      <td>{{ $item->email }}</td>
      <td><span class="badge bg-{{ $item->role->getColor()}}">{{ $item->role }}</span></td>
  <td class="text-end">
      <button type="button" class="btn  btn-secondary" wire:click="detail({{ $item->id }})">
        <i class="bi bi-eye"></i> Detail
      </button>
      <button type="button" class="btn  btn-warning" wire:click="edit({{ $item->id }})">
        <i class="bi bi-pencil"></i> Edit
      </button>
      <button type="button" class="btn  btn-danger" wire:click="delete({{ $item->id }})">
        <i class="bi bi-trash"></i> Hapus
      </button>
  </td>
</tr>
@empty
<tr>
    <td colspan="5" class="text-center text-muted py-3">
        <em>Tidak ada data tersedia.</em>
    </td>
</tr>
@endforelse
  </tbody>
</table>
        </div>

        <div class="card-footer">

    {{ $this->userList->links()}}
        </div>


    </div>
</div>
