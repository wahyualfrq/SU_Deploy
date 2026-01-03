<?php

namespace App\Livewire\Admin\Tickets;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\MatchGame;

class TicketEditComponent extends Component
{
    public Ticket $ticket;

    // RELASI
    public ?int $match_id = null;

    // FIELD TIKET
    public string $category = '';
    public string $sales_status = 'upcoming';
    public int $price = 0;
    public int $stock = 0;
    public bool $is_active = true;

    // DATA DROPDOWN
    public $matches;

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;

        // LOAD MATCHES UNTUK DROPDOWN
        $this->matches = MatchGame::with(['homeClub', 'awayClub'])
            ->orderByDesc('match_date')
            ->get();

        // INIT DATA
        $this->match_id = $ticket->match_id;
        $this->category = $ticket->category ?? '';
        $this->sales_status = $ticket->sales_status ?? 'upcoming';
        $this->price = (int) ($ticket->price ?? 0);
        $this->stock = (int) ($ticket->stock ?? 0);
        $this->is_active = (bool) ($ticket->is_active ?? true);
    }

    protected function rules(): array
    {
        return [
            'match_id' => ['required', 'exists:matches,id'],
            'category' => 'required|in:VIP,VVIP,REGULER,EKONOMI,TRIBUN_TIMUR,TRIBUN_BARAT',
            'sales_status' => ['required', 'in:upcoming,available'],
            'price' => ['required', 'integer', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ];
    }


    public function update()
    {
        $data = $this->validate();

        $this->ticket->update($data);

        session()->flash('success', 'Tiket berhasil diperbarui.');
        return redirect()->route('admin.tickets.index');
    }

    public function render()
    {
        return view('livewire.admin.tickets.edit')
            ->layout('admin.layouts.app')
            ->title('Edit Tiket');
    }
}
