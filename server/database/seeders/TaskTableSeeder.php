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
        Task::factory(100)->sequence(
            function ($sequence) {
                return [
                    'admin_id' => (($sequence->index + 1) % 2 == 0) ? $sequence->index + 1 : null,
                    'user_id' => (($sequence->index + 1) % 2 !== 0) ? $sequence->index + 1 : null,
                    'name' => 'タスク' . ($sequence->index + 1),
                ];
            }
        )->create();
    }
}
