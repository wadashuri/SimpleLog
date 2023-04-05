<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Master;

class MasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Master::factory(10)->sequence(
            fn ($sequence) => [
                'email' => 'master' . ($sequence->index + 1) . '@example.com',
                'password' => 'master' . ($sequence->index + 1),
            ],
        )->create();
    }
}
