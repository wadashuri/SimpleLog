<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)
            ->hasAttached(
                Group::factory()->sequence(
                fn ($sequence) => [
                    'name' => '部署' . ($sequence->index + 1),
                ],
            )
            )
            ->sequence(
                fn ($sequence) => [
                    'email' => 'user' . ($sequence->index + 1) . '@example.com',
                    'password' => 'user' . ($sequence->index + 1),
                ],
            )->create();
    }
}
