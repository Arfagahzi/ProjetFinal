<?php

use Illuminate\Database\Seeder;

class responsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'responsable',
            'last_name' => 'responsable',
            'email' => 'responsable@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'responsible_teacher',
            'etat' => 'actif'
        ]);
    }
}
