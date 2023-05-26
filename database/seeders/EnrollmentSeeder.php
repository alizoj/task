<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $courses = Course::all();

        $users->each(function ($user) use ($courses) {
            $enrollmentsCount = random_int(20, 40);
            $courses->random($enrollmentsCount)->each(function ($course) use ($user) {
                Enrollment::factory()->create([
                    'user_id' => $user->id,
                    'course_id' => $course->id,
                    'status' => random_int(0, 1),
                ]);
            });
        });
    }
}
