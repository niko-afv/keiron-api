<?php


namespace App\Http\Resources;


use Illuminate\Database\Eloquent\Collection;
use function foo\func;

class MyTicketResponse
{
    protected $TicketCollection;
    public function __construct(Collection $tickets)
    {
        $this->TicketCollection = $tickets;
    }

    public function asResource(){
        return  $this->TicketCollection->map(function ($ticket){
            return [
                'id' => $ticket->id,
                'user' => $ticket->user->email,
                'order' => $ticket->ticket_pedido
            ];
        });
    }
}
