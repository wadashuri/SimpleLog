<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->sequence(
            fn ($sequence) => [
                'email' => 'user' . ($sequence->index + 1) . '@example.com',
                'password' => Hash::make('user' . ($sequence->index + 1)),
            ],
        )->create();
    }
}
