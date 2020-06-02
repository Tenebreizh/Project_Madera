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

        // Commercial
        factory(App\User::class)->create([
            'email' => 'commercial@madera.com',
            'user_type_id' => factory(App\Models\UserType::class)->create([
                                'name' => 'Commercial',
                                'description' => ''
                            ]),
        ]);

        // Bureau étude
        factory(App\User::class)->create([
            'email' => 'bre@madera.com',
            'user_type_id' => factory(App\Models\UserType::class)->create([
                                'name' => "Bureau d'étude",
                                'description' => ''
                            ]),
        ]);

        // Client
        factory(App\User::class)->create([
            'email' => 'client@madera.com',
            'user_type_id' => factory(App\Models\UserType::class)->create([
                                'name' => 'Client',
                                'description' => ''
                            ]),
        ]);

        // Comptabilité
        factory(App\User::class)->create([
            'email' => 'compta@madera.com',
            'user_type_id' => factory(App\Models\UserType::class)->create([
                                'name' => 'Comptabilité',
                                'description' => ''
                            ]),
        ]);

        // Admin
        factory(App\User::class)->create([
            'email' => 'admin@madera.com',
            'user_type_id' => factory(App\Models\UserType::class)->create([
                                'name' => 'Admin',
                                'description' => ''
                            ]),
        ]);
    }
}
