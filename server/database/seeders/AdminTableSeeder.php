<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory(100)->sequence(
            fn ($sequence) => [
                'email' => 'admin' . ($sequence->index + 1) . '@example.com',
                'password' => 'admin' . ($sequence->index + 1),
            ],
        )->create();
    }
}
