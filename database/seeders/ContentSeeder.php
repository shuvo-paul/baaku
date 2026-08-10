<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Content::defaults() as $key => $value) {
            Content::query()->updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
