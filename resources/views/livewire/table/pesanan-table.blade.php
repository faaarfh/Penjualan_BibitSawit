@php

use App\Enums\Role;
use App\Enums\StatusPesanan;
$role = auth()->user()->role;
@endphp
<div>
    <h1>Pesanan</h1>


<!-- Modal Detail Form -->
<div class="modal fade" id="modal-detail" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <fieldset disabled>

                        @if ($role === Role::ADMIN)

<div class="form-group">
    <label for="pembeli">Pembeli</label>
    <input type="text" class="form-control" id="pembeli" name="pembeli" value="{{ $form->pesanan->user->name ?? ''}}">
</div>

                        @endif

                    <div class="form-group mb-3">
                        <label for="nama_bibit" class="fw-bold">Nama Bibit</label>
                        <input type="text" class="form-control" id="nama_bibit" value="{{ $form->pesanan->detail->bibit->nama_bibit ?? ''}}">
                    </div>

<div class="form-group">
    <label for="jumlah_bibit">Jumlah Bibit</label>
    <input type="number" value="{{ $form->pesanan->detail->jumlah ?? ''}}" id="jumlah_bibit" class="form-control" min="1" required>
</div>
                    <div class="form-group mb-3">
                        <label for="total_harga" class="fw-bold">Total Harga</label>
                        <input type="text" value="{{ $form->pesanan->label_total_harga ?? '' }}" class="form-control" id="total_harga" >
                    </div>

<div class="mb-3">
    <label for="payment_method" class="form-label">Metode Pembayaran</label>
    <input type="text" class="form-control" id="payment_method" name="payment_method" value="{{ $form->metode_pembayaran ?? ''}}" readonly>
</div>
                    <div class="form-group mb-3">
                        <label for="status" class="fw-bold">Status</label>
                        <input wire:model="form.status" type="text" class="form-control" id="status" placeholder="Status pesanan">
                        @error('form.status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_pesan" class="fw-bold">Tanggal Pesan</label>
                        <input wire:model="form.tanggal_pesan" type="date" class="form-control" id="tanggal_pesan">
                        @error('form.tanggal_pesan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_bayar" class="fw-bold">Tanggal Bayar</label>
                        <input wire:model="form.tanggal_bayar" type="date" class="form-control" id="tanggal_bayar">
                        @error('form.tanggal_bayar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </fieldset>
                <!-- <div class="alert alert-info mt-3"> -->
                <!--     <strong>Info:</strong> Pastikan data pesanan sudah benar sebelum melakukan pembayaran. -->
                <!-- </div> -->
            </div>

        </div>
    </div>
</div>


    <div class="card">

        <div class="card-header">

            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">

                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" wire:model.live="search" class="form-control" placeholder="Cari Pesanan...">
                </div>
                </div>
            </div>

        </div>


        <div class="card-body">

            <table class="table table-bordered align-middle">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
                        @if ($role === Role::ADMIN)
      <th scope="col">Pembeli</th>

                        @endif

      <th scope="col">Total Harga</th>
      <th scope="col">Status</th>
      <th scope="col">Tanggal Pesan</th>
      <th scope="col">Metode Pembayaran</th>
      <th class="text-end">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($this->pesananList as $item)
    <tr>
      <th scope="row">{{ $loop->index + $this->pesananList->firstItem() }}</th>
                        @if ($role === Role::ADMIN)
                        <td>{{ $item->user->name}}</td>

                        @endif
      <td>{{ $item->label_total_harga }}</td>

      <td>

<select class="form-control"
        wire:change="updateStatus({{ $item->id }}, $event.target.value)" {{ $role === Role::PEMBELI ? 'disabled' : ''}}>

    @foreach (StatusPesanan::adminOptions() as $option)
        <option value="{{ $option }}" {{ $item->status->value === $option ? 'selected' : '' }}>
            {{ $option }}
        </option>
    @endforeach

</select>

      </td>

      <td>{{ $item->tanggal_pesan }}</td>
      <td>{{ $item->metode_pembayaran }}</td>
  <td class="text-end">
      <button type="button" class="btn  btn-info" wire:click="detail({{ $item->id }})">
        <i class="bi bi-eye"></i> Detail
      </button>
  </td>
</tr>
@empty
<tr>
    <td colspan="8" class="text-center text-muted py-3">
        <em>Tidak ada data tersedia.</em>
    </td>
</tr>
@endforelse
  </tbody>
</table>
        </div>

        <div class="card-footer">

    {{ $this->pesananList->links()}}
        </div>


    </div>
</div>
