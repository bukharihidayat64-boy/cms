<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            ['name' => 'Rinjani Homestay', 'category' => 'homestay', 'is_active' => true, 'is_featured' => true],
            ['name' => 'Summit Expedition', 'category' => 'guide', 'is_active' => true, 'is_featured' => true],
            ['name' => 'Eco Porter Lombok', 'category' => 'porter', 'is_active' => true, 'is_featured' => true],
            ['name' => 'Lombok Trekking', 'category' => 'guide', 'is_active' => true, 'is_featured' => true],
        ];

        foreach ($partners as $partner) {
            Partner::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($partner['name'])],
                $partner
            );
        }
    }
}
