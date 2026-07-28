<?php

namespace Workbench\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Workbench\App\Models\Course;
use Workbench\App\Models\Lesson;

/**
 * @extends Factory<Lesson>
 */
class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'name' => fake()->unique()->sentence(3),
            'duration_minutes' => fake()->numberBetween(10, 90),
        ];
    }
}
