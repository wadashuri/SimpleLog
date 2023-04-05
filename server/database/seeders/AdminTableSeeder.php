<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory(10)->sequence(
            fn ($sequence) => [
                'email' => 'admin' . ($sequence->index + 1) . '@example.com',
                'password' => Hash::make('admin' . ($sequence->index + 1)),
            ],
        )->create();
    }
}
