<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@super.deb',
            'verified' => 1,
            'password' => '$2y$10$B9G1Tphf/NB4.ZiQwOFghO2/S1XKIIB5NpKf1H6lf9eZ51T/Izz92'
        ]);
    }
}
