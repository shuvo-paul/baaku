<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $key
 * @property string|null $value
 */
#[Fillable(['key', 'value'])]
class Content extends Model
{
    protected $table = 'contents';

    /**
     * The canonical content keys and their default values.
     *
     * @return array<string, string>
     */
    public static function defaults(): array
    {
        return [
            'hero.eyebrow' => 'Est. 1985',
            'hero.headline' => 'বাংলা ভাষা ও সাহিত্য প্রাক্তন ছাত্র সমিতি',
            'hero.subtitle' => 'বাংলা ভাষা ও সাহিত্য বিভাগের প্রাক্তন ছাত্রদের একটি ঐক্যবদ্ধ প্ল্যাটফর্ম — যেখানে আমরা একসাথে বাংলা সাহিত্য ও সংস্কৃতি সংরক্ষণ ও প্রসারে কাজ করি।',
            'hero.cta_primary_label' => 'সদস্য হোন',
            'hero.cta_primary_url' => '#join',
            'hero.cta_secondary_label' => 'আরও জানুন',
            'hero.cta_secondary_url' => '#about',
        ];
    }

    /**
     * All content values: stored rows win, defaults fill the gaps.
     *
     * @return Collection<string, string|null>
     */
    public static function values(): Collection
    {
        return self::query()->pluck('value', 'key')->union(self::defaults());
    }
}
