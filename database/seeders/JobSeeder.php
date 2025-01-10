<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load job list from file
        $jobListing = include database_path('seeders/data/job_listing.php');

        $result = [];

        // Get user ids from User
        $userIds = User::pluck('id')->toArray();

        foreach ($jobListing as $index => $jobs) {
            // Assign user id to job
            $jobs['user_id'] = $userIds[array_rand($userIds)];

            // Add timestamps
            $jobs['created_at'] = now();
            $jobs['updated_at'] = now();

            array_push($result, $jobs);
        }

        // Insert jobs
        DB::table('job_listing')->insert($result);
        echo 'Jobs created successfully!';
    }
}
