<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(500)->sequence(
            fn ($sequence) => [
                'name' => '顧客' . ($sequence->index + 1),
            ],
        )->create();
    }
}
