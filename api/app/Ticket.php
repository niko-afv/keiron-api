<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['ticket_pedido', 'id_user'];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
