<?php

namespace App\Livewire\Admin\Clubs;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Club;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function delete($id)
    {
        Club::findOrFail($id)->delete();
        session()->flash('success', 'Klub berhasil dihapus');
    }

    public function render()
    {
        return view('livewire.admin.clubs.index', [
            'clubs' => Club::latest()->paginate(10),
        ])->layout('admin.layouts.app');
    }
}
