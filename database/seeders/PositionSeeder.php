<?php

namespace Database\Seeders;

use Alumkit\Alumkit\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'সভাপতি (ভারপ্রাপ্ত)',
            'সহ-সভাপতি',
            'সাধারণ সম্পাদক',
            'যুগ্ম-সাধারণ সম্পাদক',
            'কোষাধ্যক্ষ',
            'সাংগঠনিক সম্পাদক',
            'দপ্তর সম্পাদক',
            'সাংস্কৃতিক বিষয়ক সম্পাদক',
            'ক্রীড়া বিষয়ক সম্পাদক',
            'আন্তর্জাতিক যোগাযোগ, প্রচার ও সংযোগ বিষয়ক সম্পাদক',
            'শিক্ষার্থী কল্যাণ বিষয়ক সম্পাদক',
            'সাহিত্য, গবেষণা ও প্রকাশনা সম্পাদক',
            'মিডিয়া ও প্রচার বিষয়ক সম্পাদক',
            'কার্যনির্বাহী সদস্য',
        ];

        foreach ($names as $name) {
            Position::firstOrCreate(['name' => $name]);
        }
    }
}
