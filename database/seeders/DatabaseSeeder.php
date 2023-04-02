<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create([
            'isAdmin'=>false
        ]);

        //  \App\Models\User::factory()->create([
        //         'name' => 'admin',
        //         'username' => 'pcnd',
        //         'email' => 'admin1@xample.com',
        //         'donvi' => 'all',
        //         'isAdmin' => true,
        //     ],
      
        // );    
    }
}
