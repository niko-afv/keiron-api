<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'Nicolás Fredes',
            'email' => 'niko.afv@gmail.com',
            'password' => Hash::make('keiron-user'),
            'id_tipouser' => 2,
            'api_token' => Str::random(80),
        ]);
    }
}
