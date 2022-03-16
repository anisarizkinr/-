<?php

namespace Database\Seeders;

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
<<<<<<< HEAD
        $this->call(BarangSeeder::class);
=======
        $this->call(PegawaiSeeder::class);
>>>>>>> af2ed41501cf16577291d7150026c986d291e41b
    }
}
