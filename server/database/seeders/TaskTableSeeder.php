<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::factory(1000)->sequence(
            function ($sequence) {
                return [
                    'name' => 'タスク' . ($sequence->index + 1),
                ];
            }
        )->create();
    }
}
