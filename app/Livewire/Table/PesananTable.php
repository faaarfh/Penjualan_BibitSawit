<?php

namespace App\Livewire\Table;

use App\Enums\Role;
use App\Enums\StatusPesanan;
use App\Livewire\Forms\PesananForm;
use App\Models\Bibit;
use App\Models\Pesanan;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PesananTable extends Component
{
    use WithModal;
    use WithNotify;
    use WithPagination;

    public string $search = '';

    public PesananForm $form;

    public function updateStatus($id, $status)
    {
        $pesanan = Pesanan::query()->with('detail', 'detail.bibit')->findOrFail($id);
        $pesanan->status = $status;
        $pesanan->save();

        // Jika status pesanan diterima, kurangi stok bibit
        if ($status === StatusPesanan::DITERIMA->value) {
            $bibit = Bibit::query()->find($pesanan->detail->bibit_id);

            if ($bibit) {
                $bibit->stok -= $pesanan->detail->jumlah;
                $bibit->save();
            }
        }

        $this->notifySuccess('Status pesanan berhasil diperbarui!');
    }

    #[Computed]
    public function pesananList()
    {
        $user = auth()->user();

        $query = Pesanan::query()

            ->when($this->search, function ($query) {
                $query->whereAny(['user_id', 'total_harga', 'status', 'tanggal_pesan', 'tanggal_bayar'], 'like', '%'.$this->search.'%');
            });

        if ($user->role === Role::ADMIN) {

        } elseif ($user->role === Role::PEMBELI) {
            $query->where('user_id', auth()->user()->id);
        }

        return $query
            ->latest()
            ->paginate(10);
    }

    public function add()
    {
        $this->form->reset();
        $this->openModal('modal-add');
    }

    public function save()
    {

        $this->form->store();
        $this->notifySuccess('Pesanan berhasil ditambahkan!');

        $this->closeModal('modal-add');
        $this->form->reset();

    }

    public function detail($id)
    {

        $this->form->fill($id);
        $this->openModal('modal-detail');

    }

    public function edit($id)
    {

        $this->form->fill($id);
        $this->openModal('modal-edit');

    }

    public function update()
    {
        $this->form->update();

        $this->notifySuccess('Pesanan berhasil diperbarui!');
        $this->closeModal('modal-edit');

    }

    public function delete($id)
    {
        $this->form->fill($id);
        $this->dispatch('deleteConfirmation', message: 'Yakin untuk menghapus data Pesanan?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed()
    {
        $this->form->delete();
        $this->notifySuccess('Pesanan berhasil dihapus!');
    }

    public function render()
    {
        return view('livewire.table.pesanan-table');
    }
}
