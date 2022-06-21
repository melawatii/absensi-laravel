<?php

namespace Database\Seeders;

use App\Models\Rayon;
use App\Models\Rombel;
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
        // \App\Models\User::factory(10)->create();
        for ($i=1; $i <= 5; $i++) {
            Rombel::create([
                'rombel' => 'RPL XI-' . $i
            ]);
        }

        Rayon::create([
            'rayon' => 'Tajur 5',
            'pemb_rayon' => 'Budi'
        ]);

        $this->call(CreateUserSeeder::class);
    }
}
