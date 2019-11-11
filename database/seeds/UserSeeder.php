<?php

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
        // 4 random users
        factory(App\User::class, 4)->create();

        // Special test user
        factory(App\User::class)->create([
            'email' => 'test@test.com',
        ]);
    }
}
