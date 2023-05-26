<?php

namespace Database\Factories;

use App\Enums\EnrollmentStatus;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'user_id' => User::factory(),
            'status' => fake()->randomElement([
                EnrollmentStatus::IN_PROGRESS,
                EnrollmentStatus::COMPLETE
            ]),
        ];
    }
}
