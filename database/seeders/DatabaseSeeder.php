<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Category;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Meal;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        for ($i=1; $i <= 10; $i++) { 
            Category::create([
                'name' => 'Category' . $i,
                'order' => rand(1,10)
            ]);
        }
        for ($i=1; $i <= 100; $i++) { 
            Meal::create([
                'category_id' => rand(1,10),
                'name' => 'Meal' . $i,
                'price' => fake()->numberBetween(10000,50000),
                'image' => 'images/' . rand(1,9) . '.jpeg',
                'order' => rand(1,100)
            ]);
        }

        for ($i=1; $i <= 5; $i++) { 
            User::create([
                'name' => fake()->name(),
                'password' => Hash::make(123456),
                'phone' => '998941234' . rand(100,999),
                'image' => 'images/' . rand(1,6) . '.jpeg'
            ]);
        }

        for ($i=1; $i <= 5; $i++) { 
            Department::create(['name' => 'Name' . $i]);
        }

        for ($i=1; $i <= 5; $i++) { 
            Employee::create([
                'user_id' => $i % 5 !== 0 ? $i % 5 : 5,
                'department_id' => rand(1,5),
                'salary_type' => 'fixed',
                'salary_amount' => rand(1000000,156161651),
                'bonus' => 0,
                'salary_date' => '2024-12-'. rand(01,31),
                'start_time' => '08:00',
                'end_time' => '16:00',
                'overall_work' => 8,
            ]);
        }

        for ($i=1; $i <= 10; $i++) { 
            Attendance::create([
                'employee_id' => rand(1,5),
                'user_id' => rand(1,5),
                'date' => '2024-10-' . rand(01,31),
                'start_time' => '07:56',
                'end_time' => '16:06',
                'overall_time' => 8
            ]);
        }
    }
}
