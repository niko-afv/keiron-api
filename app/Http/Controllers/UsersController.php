<?php

namespace App\Http\Controllers;

use App\Http\Resources\MyTicketResponse;
use App\Http\Resources\Tickets;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data'=> User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function show($id)
    {
        $user = User::find($id)->has('tickets')->get();
        /*
        $data = $user->tickets->map(function ($item) use($user){
            return [
                'id'=> $item->id,
                'user'=> $user->email,
                'order'=> $item->ticket_pedido
            ];
        });
        */
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tickets($id)
    {
        $ticketscollection = User::find($id)->tickets;
        $resource = new MyTicketResponse($ticketscollection);
        return response()->json([
            'error' => false,
            'data' => $resource->asResource()
        ]);
    }
}
