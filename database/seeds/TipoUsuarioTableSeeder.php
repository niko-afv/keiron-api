<?php

use Illuminate\Database\Seeder;

class TipoUsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_usuario')->truncate();

        DB::table('tipos_usuario')->insert([
            'id' => 1,
            'name'=> 'normal'
        ]);

        DB::table('tipos_usuario')->insert([
            'id' => 2,
            'name'=> 'admin'
        ]);
    }
}
