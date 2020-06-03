<?php

use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Action::class)->create([
            'label' => 'Create',
            
        ]);
        
        factory(App\Models\Action::class)->create([
            'label' => 'Update',
            
        ]);

        factory(App\Models\Action::class)->create([
            'label' => 'Delete',
            
        ]);

        factory(App\Models\Action::class)->create([
            'label' => 'Connection',
            
        ]);
    }
}