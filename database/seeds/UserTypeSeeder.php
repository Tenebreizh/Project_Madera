<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\Models\UserType::class)->create([
            'name' => 'Commercial',
            'description' => ''
        ]);

        factory(App\Models\UserType::class)->create([
            'name' => "Bureau d'étude",
            'description' => ''
        ]);
            
        factory(App\Models\UserType::class)->create([
            'name' => 'Client',
            'description' => ''
        ]);
            
        factory(App\Models\UserType::class)->create([
            'name' => 'Admin',
            'description' => ''
        ]);
                
        factory(App\Models\UserType::class)->create([
            'name' => 'Comptabilité',
            'description' => ''
        ]);
                    
        factory(App\Models\UserType::class, 10)->create();
    }
}
