<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\TicketOrder;

class TicketPurchaseComponent extends Component
{
    public $confirmingTicketId = null;
    public $search = '';

    public $ticket;
    public $match = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'match' => ['except' => null],
    ];

    public function mount($ticket = null)
    {
        if ($ticket) {
            $this->ticket = Ticket::findOrFail($ticket);
        }
    }

    public function confirmBuy(int $ticketId)
    {
        $this->confirmingTicketId = $ticketId;
    }

    public function buyConfirmed()
    {
        $ticket = Ticket::findOrFail($this->confirmingTicketId);

        if ($ticket->stock < 1) {
            session()->flash('error', 'Tiket sudah habis');
            $this->confirmingTicketId = null;
            return;
        }

        TicketOrder::create([
            'user_id' => auth()->id(),
            'ticket_id' => $ticket->id,
            'quantity' => 1,
            'total_price' => $ticket->price,
            'status' => 'paid',
        ]);

        // 🔽 KURANGI STOK
        $ticket->decrement('stock');

        // ✅ INI KUNCINYA
        $this->ticket->refresh();

        session()->flash('success', 'Tiket berhasil dibeli!');
        $this->confirmingTicketId = null;
    }


    public function render()
    {
        // DETAIL TIKET
        if ($this->ticket) {
            return view('livewire.client.tickets.detail')
                ->layout('client.layouts.app')
                ->title('Detail Tiket');
        }
        $search = trim($this->search);

        $tickets = Ticket::where('is_active', true)
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('match_name', 'LIKE', "%{$search}%")
                        ->orWhere('stadium', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('match_date')
            ->get();

        // LIST TIKET
        return view('livewire.client.tickets.purchase', [
            'tickets' => Ticket::where('is_active', true)
                ->orderBy('match_date')
                ->get()
        ])->layout('client.layouts.app')
            ->title('Beli Tiket');
    }


}
