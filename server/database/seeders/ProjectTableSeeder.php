<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory(100)->sequence(
            fn ($sequence) => [
                'name' => '案件' . ($sequence->index + 1),
                'customer_manager' => '顧客担当者' . ($sequence->index + 1),
            ],
        )->create();
    }
}
