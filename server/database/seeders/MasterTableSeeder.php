<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Master;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('masters')->insert([
            'email' => 'sinceritylab@example.com',
            'name' => 'SincerityLab',
            'administrator' => 1,
            'password' => Hash::make('sinceritylab'),
            'remember_token' => '123456789abcdefghijklmn',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Master::factory(100)->sequence(
            fn ($sequence) => [
                'email' => 'master' . ($sequence->index + 1) . '@example.com',
                'password' => 'master' . ($sequence->index + 1),
            ],
        )->create();
    }
}
