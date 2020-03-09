<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->truncate();

        DB::table('tickets')->insert([
            'id_user' => 1,
            'ticket_pedido' => 'AAA01',
        ]);
        DB::table('tickets')->insert([
            'id_user' => 1,
            'ticket_pedido' => 'AAA02',
        ]);
        DB::table('tickets')->insert([
            'id_user' => 1,
            'ticket_pedido' => 'AAA03',
        ]);
        DB::table('tickets')->insert([
            'id_user' => 1,
            'ticket_pedido' => 'AAA04',
        ]);
        DB::table('tickets')->insert([
            'id_user' => 1,
            'ticket_pedido' => 'AAA05',
        ]);
    }
}
