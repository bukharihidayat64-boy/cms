<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    public function run(): void
    {
        $routes = [
            [
                'name' => 'Sembalun East Route',
                'difficulty' => 'hard',
                'duration' => '3 Days / 2 Nights',
                'elevation_gain' => 3726,
                'start_point' => 'Sembalun Lawang',
                'description' => 'The most popular gateway starting through vast savannas before the steep climb to the summit crater rim.',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Senaru North Route',
                'difficulty' => 'moderate',
                'duration' => '4 Days / 3 Nights',
                'elevation_gain' => 3726,
                'start_point' => 'Senaru',
                'description' => 'A lush jungle trek passing through diverse flora and fauna, offering the best views of the Segara Anak lake.',
                'is_active' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($routes as $route) {
            Route::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($route['name'])],
                $route
            );
        }
    }
}
