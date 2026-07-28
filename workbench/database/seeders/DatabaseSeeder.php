<?php

namespace Workbench\Database\Seeders;

use Illuminate\Database\Seeder;
use Workbench\App\Models\Course;
use Workbench\App\Models\Lesson;
use Workbench\App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // The panel auto-authenticates as this user, see AutoLogin middleware.
        User::factory()->create([
            'name' => 'Workbench User',
            'email' => 'workbench@example.com',
        ]);

        Course::factory()
            ->count(3)
            ->has(Lesson::factory()->count(5))
            ->create()
        ;

        Course::factory()->create(['name' => 'Course without lessons']);
    }
}
