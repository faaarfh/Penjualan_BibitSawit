<?php

namespace App\Livewire\Table;

use App\Livewire\Forms\BibitForm;
use App\Models\Bibit;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class BibitTable extends Component
{
    use WithModal;
    use WithNotify;
    use WithPagination;

    public string $search = '';

    public BibitForm $form;

    #[Computed]
    public function bibitList()
    {
        return Bibit::query()
            ->when($this->search, function ($query) {
                $query->whereAny(['nama_bibit', 'deskripsi', 'stok', 'harga'], 'like', '%'.$this->search.'%');
            })
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
        $this->notifySuccess('Bibit berhasil ditambahkan!');

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

        $this->notifySuccess('Bibit berhasil diperbarui!');
        $this->closeModal('modal-edit');

    }

    public function delete($id)
    {
        $this->form->fill($id);
        $this->dispatch('deleteConfirmation', message: 'Yakin untuk menghapus data Bibit?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed()
    {
        $this->form->delete();
        $this->notifySuccess('Bibit berhasil dihapus!');
    }

    public function render()
    {
        return view('livewire.table.bibit-table');
    }
}
