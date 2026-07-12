<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@rinjanitrail.id')->first();

        $articles = [
            [
                'title' => 'Essential Gear for Rinjani Summit: A Complete Checklist',
                'excerpt' => "Don't be caught unprepared. Here is the definitive list of what to pack for your 3-day trek.",
                'content' => "Pendakian Gunung Rinjani membutuhkan persiapan matang, terutama perlengkapan. Pastikan Anda membawa trekking pole, sepatu gunung, jaket tahan angin, sleeping bag, dan perlengkapan pribadi lainnya.",
                'category' => 'preparation',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Segara Anak: The Spiritual Heart of Lombok',
                'excerpt' => 'Discover the myths and the natural wonders surrounding the volcanic crater lake.',
                'content' => "Danau Segara Anak adalah danau kawah vulkanik yang menjadi daya tarik utama pendakian Rinjani. Dengan pemandangan yang memukau, danau ini memiliki banyak mitos dan keindahan alam yang sayang untuk dilewatkan.",
                'category' => 'destinations',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDay(),
            ],
            [
                'title' => 'Rising Above: 10 Hikers Share Their Rinjani Experience',
                'excerpt' => 'From first-time climbers to seasoned veterans, hear the stories of resilience.',
                'content' => "Banyak pendaki yang terinspirasi oleh keindahan Rinjani. Dalam artikel ini, 10 pendaki berbagi pengalaman mereka, mulai dari tantangan fisik hingga momen tak terlupakan di puncak.",
                'category' => 'stories',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => now()->subDays(2),
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($article['title'])],
                array_merge($article, ['author_id' => $admin?->id])
            );
        }
    }
}
