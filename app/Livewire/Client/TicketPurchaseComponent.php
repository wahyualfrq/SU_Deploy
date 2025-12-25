<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\TicketOrder;
use Illuminate\Support\Facades\DB;

class TicketPurchaseComponent extends Component
{
    public $confirmingTicketId = null;
    public $search = '';
    public $ticket = null;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    /**
     * ===========================
     * MOUNT (DETAIL TIKET)
     * ===========================
     */
    public function mount($ticket = null)
    {
        if ($ticket) {
            $this->ticket = Ticket::query()
                ->join('matches', 'tickets.match_id', '=', 'matches.id')
                ->join('clubs as home_club', 'home_club.id', '=', 'matches.home_club_id')
                ->join('clubs as away_club', 'away_club.id', '=', 'matches.away_club_id')
                ->where('tickets.id', $ticket)
                ->select(
                    'tickets.*',
                    'matches.match_date',
                    'matches.stadium',
                    DB::raw("CONCAT(home_club.name,' vs ',away_club.name) AS match_name")
                )
                ->firstOrFail();
        }
    }

    public function confirmBuy(int $ticketId)
    {
        $this->confirmingTicketId = $ticketId;
    }

    /**
     * ===========================
     * PROSES PEMBELIAN
     * ===========================
     */
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

        // kurangi stok
        $ticket->decrement('stock');

        session()->flash('success', 'Tiket berhasil dibeli!');
        $this->confirmingTicketId = null;
    }

    /**
     * ===========================
     * RENDER
     * ===========================
     */
    public function render()
    {
        /**
         * DETAIL PAGE
         */
        if ($this->ticket) {
            return view('livewire.client.tickets.detail', [
                'ticket' => $this->ticket
            ])
                ->layout('client.layouts.app')
                ->title('Detail Tiket');
        }

        /**
         * LIST TIKET
         */
        $search = trim($this->search);

        $tickets = Ticket::query()
            ->join('matches', 'tickets.match_id', '=', 'matches.id')
            ->join('clubs as home_club', 'home_club.id', '=', 'matches.home_club_id')
            ->join('clubs as away_club', 'away_club.id', '=', 'matches.away_club_id')
            ->where('tickets.is_active', true)
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('home_club.name', 'LIKE', "%{$search}%")
                      ->orWhere('away_club.name', 'LIKE', "%{$search}%")
                      ->orWhere('matches.stadium', 'LIKE', "%{$search}%");
                });
            })
            ->orderByRaw("
                CASE
                    WHEN tickets.sales_status = 'available' THEN 0
                    ELSE 1
                END
            ")
            ->orderBy('matches.match_date', 'asc')
            ->select(
                'tickets.*',
                'matches.match_date',
                'matches.stadium',
                DB::raw("CONCAT(home_club.name,' vs ',away_club.name) AS match_name")
            )
            ->get();

        return view('livewire.client.tickets.purchase', compact('tickets'))
            ->layout('client.layouts.app')
            ->title('Beli Tiket');
    }
}
