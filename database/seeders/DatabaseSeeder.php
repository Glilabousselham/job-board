<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Application;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create()->each(function (User $user) {
        //     if ($user->is_employer)
        //         $user->companies()->factory(random_int(1, 3))->create();
        // });
        /** @var int[] */
        $categories = [];
        Category::factory(7)->create()->each(function (Category $category) use (&$categories) {
            $categories[] = $category->id;
        });

        $users_can_applay_for_jobs = [];
        $jobs = [];
        User::factory(10)->create()->each(function (User $user) use ($categories, &$users_can_applay_for_jobs, &$jobs) {
            if (!$user->is_employer) {
                $users_can_applay_for_jobs[] = $user->id;
                return;
            }
            Company::factory(random_int(1, 3), ['user_id' => $user->id])
                ->create()
                ->each(function (Company $company) use ($categories, &$jobs) {
                    Job::factory(random_int(1, 7), ['company_id' => $company->id])->create()->each(function (Job $job) use ($categories, &$jobs) {
                        $jobs[] = $job->id;
                        $job->categories()->sync(
                            fake()->randomElements($categories, random_int(1, ceil(count($categories) / 3)))
                        );
                    });
                });
        });


        foreach ($users_can_applay_for_jobs as $user) {
            foreach (fake()->randomElements($jobs, random_int(1, ceil(count($jobs) / 2))) as $job) {
                Application::factory(1, ['job_id' => $job, 'user_id' => $user])->create();
            }
        }


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}