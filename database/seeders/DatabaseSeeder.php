<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'example',
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password@attendance'),
            'course_id' => 1,
        ]);
    }
}
