<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Skill;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(10)->create();
        $tasks = Task::factory(10)->make()
        ->each(function($task) use($users) {
            $task->user_id = $users->random()->id;
            $task->save();
        });

        $comments = Comment::factory(40)->make()
        ->each(function($comment) use($tasks, $users) {
            $comment->user_id = $users->random()->id;
            $comment->task_id = $tasks->random()->id;
            $comment->save();
        });
    }
}
