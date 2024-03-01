<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\star::factory()->create([
            'nom' => 'Lagaffe',
            'prenom' => 'Gaston',
            'imagePath' => '',
            'description' => ''
        ]);
        \App\Models\star::factory()->create([
            'nom' => 'Haddock',
            'prenom' => 'Archibald',
            'imagePath' => '',
            'description' => ''
        ]);
    }
}
