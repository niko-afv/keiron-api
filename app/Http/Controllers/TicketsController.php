<?php

namespace App\Http\Controllers;

use App\Http\Resources\MyTicketResponse;
use App\Http\Resources\Ticket as TicketResource;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index() {
        return response()->json([
            'error' => false,
            'data' => $this->getTicketscollection()
        ]);
    }

    public function show($id) {
        return new TicketResource(Ticket::find($id));
    }

    public function update(Request $request, $id) {
        $user = User::where('email', $request->user)->first();
        $ticket = Ticket::find($id);
        $ticket->user()->associate($user);
        $ticket->save();
        return response()->json([
            'error' => false,
            'data' => $this->getTicketscollection()
        ]);
    }

    protected function getTicketscollection(){
        $ticketscollection = Ticket::all();
        $resource = new MyTicketResponse($ticketscollection);
        return $resource->asResource();
    }

    public function store(Request $request){
        $user = User::where('email', $request->user)->first();
        $new_ticket = [
            'ticket_pedido' => $request->order,
            'id_user' => $user->id
        ];
        Ticket::create($new_ticket);
        return response()->json([
            'error' => false,
            'data' => $this->getTicketscollection()
        ]);
    }

    public function destroy($id){
        Ticket::find($id)->delete();
        return response()->json([
            'error' => false,
            'data' => $this->getTicketscollection()
        ]);
    }
}
