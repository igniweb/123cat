<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the users table seeding.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $users = [
            'zepp.muller@gmail.com'    => 'admin',
            'igniweb.net@gmail.com'    => 'admin',
            'contact.123cat@gmail.com' => 'backend',
        ];
        foreach ($users as $email => $role)
        {
            User::create([
                'role'  => $role,
                'email' => $email,
            ]);
        }
    }

}
