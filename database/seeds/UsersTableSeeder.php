<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'=>'Admin',
            'email'=>'maharjanricky@gmail.com',
            'password'=>bcrypt('aezakmi'),
            'type'=>1
        ]);
    }
}
