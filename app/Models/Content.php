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
     * Per-section field definitions: label, input type, and default value.
     *
     * @return array<string, array{label: string, fields: array<string, array{label: string, type: string, default: string}>}>
     */
    public static function sections(): array
    {
        return [
            'hero' => [
                'label' => 'Homepage',
                'fields' => [
                    'hero.eyebrow' => ['label' => 'Eyebrow', 'type' => 'text', 'default' => 'Est. 2024'],
                    'hero.headline' => ['label' => 'Headline', 'type' => 'textarea', 'default' => 'বাংলা অ্যালামনাই অ্যাসোসিয়েশন'],
                    'hero.subtitle' => ['label' => 'Subtitle', 'type' => 'textarea', 'default' => 'বাংলা ভাষা ও সাহিত্য বিভাগের প্রাক্তন ছাত্রদের একটি ঐক্যবদ্ধ প্ল্যাটফর্ম — যেখানে আমরা একসাথে বাংলা সাহিত্য ও সংস্কৃতি সংরক্ষণ ও প্রসারে কাজ করি।'],
                    'hero.cta_primary_label' => ['label' => 'Primary Button Label', 'type' => 'text', 'default' => 'সদস্য হোন'],
                    'hero.cta_primary_url' => ['label' => 'Primary Button URL', 'type' => 'text', 'default' => '#join'],
                    'hero.cta_secondary_label' => ['label' => 'Secondary Button Label', 'type' => 'text', 'default' => 'আরও জানুন'],
                    'hero.cta_secondary_url' => ['label' => 'Secondary Button URL', 'type' => 'text', 'default' => '#about'],
                ],
            ],
            'about' => [
                'label' => 'About',
                'fields' => [
                    'about.eyebrow' => ['label' => 'Eyebrow', 'type' => 'text', 'default' => 'About Us'],
                    'about.heading' => ['label' => 'Heading', 'type' => 'textarea', 'default' => 'বাংলা সাহিত্যের ঐতিহ্য বহনকারী একটি সম্প্রদায়'],
                    'about.body_1' => ['label' => 'Paragraph 1', 'type' => 'textarea', 'default' => 'আমাদের সমিতি ১৯৮৫ সালে প্রতিষ্ঠিত হয়েছিল বাংলা ভাষা ও সাহিত্য বিভাগের প্রাক্তন ছাত্রদের একটি সেতুবন্ধন হিসেবে। আজ আমরা ৫০০+ সদস্য নিয়ে বাংলা সাহিত্য, সংস্কৃতি ও শিক্ষার প্রসারে কাজ করে যাচ্ছি।'],
                    'about.body_2' => ['label' => 'Paragraph 2', 'type' => 'textarea', 'default' => 'আমরা বিশ্বাস করি বাংলা ভাষা ও সাহিত্য আমাদের জাতীয় পরিচয়ের মূল ভিত্তি। এই ভিত্তিকে শক্তিশালী করতে আমরা সাহিত্য আলোচনা, সেমিনার, প্রকাশনা এবং সাংস্কৃতিক অনুষ্ঠানের আয়োজন করি।'],
                    'about.cta_label' => ['label' => 'Button Label', 'type' => 'text', 'default' => 'বিস্তারিত জানুন'],
                    'about.cta_url' => ['label' => 'Button URL', 'type' => 'text', 'default' => '#'],
                ],
            ],
            'announcement' => [
                'label' => 'Announcement',
                'fields' => [
                    'announcement.label' => ['label' => 'Label', 'type' => 'text', 'default' => 'ঘোষণা'],
                    'announcement.month' => ['label' => 'Month', 'type' => 'text', 'default' => 'আগস্ট'],
                    'announcement.day' => ['label' => 'Day', 'type' => 'text', 'default' => '১৫'],
                    'announcement.year' => ['label' => 'Year', 'type' => 'text', 'default' => '২০২৬'],
                    'announcement.title' => ['label' => 'Title', 'type' => 'textarea', 'default' => 'বার্ষিক সাধারণ সভা — সকল সদস্যদের উপস্থিতি কামনা করা হচ্ছে'],
                    'announcement.body' => ['label' => 'Body', 'type' => 'textarea', 'default' => 'আগামী ১৫ আগস্ট বিকেল ৪টায় অনুষ্ঠান কক্ষে বার্ষিক সাধারণ সভা অনুষ্ঠিত হবে। সকল আজীবন সদস্যদের উপস্থিত থাকার অনুরোধ জানানো হচ্ছে।'],
                    'announcement.cta_label' => ['label' => 'Link Label', 'type' => 'text', 'default' => 'বিস্তারিত জানুন'],
                    'announcement.cta_url' => ['label' => 'Link URL', 'type' => 'text', 'default' => '#'],
                ],
            ],
            'stats' => [
                'label' => 'Impact Stats',
                'fields' => [
                    'stats.eyebrow' => ['label' => 'Eyebrow', 'type' => 'text', 'default' => 'Our Impact'],
                    'stats.value_1' => ['label' => 'Stat 1 Value', 'type' => 'text', 'default' => '৫০০+'],
                    'stats.label_1' => ['label' => 'Stat 1 Label', 'type' => 'text', 'default' => 'সদস্য'],
                    'stats.value_2' => ['label' => 'Stat 2 Value', 'type' => 'text', 'default' => '৩৫+'],
                    'stats.label_2' => ['label' => 'Stat 2 Label', 'type' => 'text', 'default' => 'বছরের ঐতিহ্য'],
                    'stats.value_3' => ['label' => 'Stat 3 Value', 'type' => 'text', 'default' => '১০০+'],
                    'stats.label_3' => ['label' => 'Stat 3 Label', 'type' => 'text', 'default' => 'অনুষ্ঠান'],
                    'stats.value_4' => ['label' => 'Stat 4 Value', 'type' => 'text', 'default' => '৫০+'],
                    'stats.label_4' => ['label' => 'Stat 4 Label', 'type' => 'text', 'default' => 'প্রকাশনা'],
                ],
            ],
            'cta' => [
                'label' => 'Call to Action',
                'fields' => [
                    'cta.eyebrow' => ['label' => 'Eyebrow', 'type' => 'text', 'default' => 'Join Us'],
                    'cta.heading' => ['label' => 'Heading', 'type' => 'textarea', 'default' => 'আমাদের সমিতিতে যুক্ত হোন'],
                    'cta.body' => ['label' => 'Body', 'type' => 'textarea', 'default' => 'বাংলা ভাষা ও সাহিত্যের প্রতি ভালোবাসা নিয়ে আমাদের সাথে যুক্ত হোন। একসাথে আমরা বাংলা সাহিত্য ও সংস্কৃতি সংরক্ষণ ও প্রসারে কাজ করব।'],
                    'cta.primary_label' => ['label' => 'Primary Button Label', 'type' => 'text', 'default' => 'সদস্যপদ আবেদন'],
                    'cta.primary_url' => ['label' => 'Primary Button URL', 'type' => 'text', 'default' => '#'],
                    'cta.secondary_label' => ['label' => 'Secondary Button Label', 'type' => 'text', 'default' => 'যোগাযোগ করুন'],
                    'cta.secondary_url' => ['label' => 'Secondary Button URL', 'type' => 'text', 'default' => '#'],
                ],
            ],
            'nav' => [
                'label' => 'Navigation',
                'fields' => [
                    'nav.brand' => ['label' => 'Brand Name', 'type' => 'text', 'default' => 'বাকু'],
                    'nav.home_label' => ['label' => 'Home Label', 'type' => 'text', 'default' => 'হোম'],
                    'nav.home_url' => ['label' => 'Home URL', 'type' => 'text', 'default' => '#home'],
                    'nav.about_label' => ['label' => 'About Label', 'type' => 'text', 'default' => 'পরিচিতি'],
                    'nav.about_url' => ['label' => 'About URL', 'type' => 'text', 'default' => '#about'],
                    'nav.events_label' => ['label' => 'Events Label', 'type' => 'text', 'default' => 'ইভেন্ট'],
                    'nav.events_url' => ['label' => 'Events URL', 'type' => 'text', 'default' => '#events'],
                    'nav.contact_label' => ['label' => 'Contact Label', 'type' => 'text', 'default' => 'যোগাযোগ'],
                    'nav.contact_url' => ['label' => 'Contact URL', 'type' => 'text', 'default' => '#contact'],
                ],
            ],
            'footer' => [
                'label' => 'Footer',
                'fields' => [
                    'footer.heading' => ['label' => 'Heading', 'type' => 'textarea', 'default' => 'আমরা সবসময় আপনার পাশে'],
                    'footer.quick_links_heading' => ['label' => 'Quick Links Heading', 'type' => 'text', 'default' => 'দ্রুত লিংক'],
                    'footer.quick_link_1_label' => ['label' => 'Quick Link 1 Label', 'type' => 'text', 'default' => 'হোম'],
                    'footer.quick_link_1_url' => ['label' => 'Quick Link 1 URL', 'type' => 'text', 'default' => '#home'],
                    'footer.quick_link_2_label' => ['label' => 'Quick Link 2 Label', 'type' => 'text', 'default' => 'আমাদের সম্পর্কে'],
                    'footer.quick_link_2_url' => ['label' => 'Quick Link 2 URL', 'type' => 'text', 'default' => '#about'],
                    'footer.quick_link_3_label' => ['label' => 'Quick Link 3 Label', 'type' => 'text', 'default' => 'ইভেন্ট'],
                    'footer.quick_link_3_url' => ['label' => 'Quick Link 3 URL', 'type' => 'text', 'default' => '#events'],
                    'footer.contact_heading' => ['label' => 'Contact Heading', 'type' => 'text', 'default' => 'যোগাযোগ'],
                    'footer.address' => ['label' => 'Address', 'type' => 'textarea', 'default' => 'বাংলা বিভাগ, খুলনা বিশ্ববিদ্যালয়, খুলনা-৯১০০'],
                    'footer.email' => ['label' => 'Email', 'type' => 'text', 'default' => 'info@banglaalumni.org'],
                    'footer.phone' => ['label' => 'Phone', 'type' => 'text', 'default' => '+880 1700-000000'],
                    'footer.membership_heading' => ['label' => 'Membership Heading', 'type' => 'text', 'default' => 'সদস্যপদ'],
                    'footer.membership_link_1_label' => ['label' => 'Membership Link 1 Label', 'type' => 'text', 'default' => 'সদস্য হোন'],
                    'footer.membership_link_1_url' => ['label' => 'Membership Link 1 URL', 'type' => 'text', 'default' => '#'],
                    'footer.membership_link_2_label' => ['label' => 'Membership Link 2 Label', 'type' => 'text', 'default' => 'সদস্য তালিকা'],
                    'footer.membership_link_2_url' => ['label' => 'Membership Link 2 URL', 'type' => 'text', 'default' => '#'],
                    'footer.membership_link_3_label' => ['label' => 'Membership Link 3 Label', 'type' => 'text', 'default' => 'সদস্য সুবিধা'],
                    'footer.membership_link_3_url' => ['label' => 'Membership Link 3 URL', 'type' => 'text', 'default' => '#'],
                    'footer.membership_link_4_label' => ['label' => 'Membership Link 4 Label', 'type' => 'text', 'default' => 'বার্ষিক সমাবেশ'],
                    'footer.membership_link_4_url' => ['label' => 'Membership Link 4 URL', 'type' => 'text', 'default' => '#'],
                    'footer.social_heading' => ['label' => 'Social Heading', 'type' => 'text', 'default' => 'সামাজিক যোগাযোগ'],
                    'footer.social_facebook_url' => ['label' => 'Facebook URL', 'type' => 'text', 'default' => '#'],
                    'footer.social_youtube_url' => ['label' => 'YouTube URL', 'type' => 'text', 'default' => '#'],
                    'footer.social_linkedin_url' => ['label' => 'LinkedIn URL', 'type' => 'text', 'default' => '#'],
                    'footer.copyright' => ['label' => 'Copyright', 'type' => 'text', 'default' => '© ২০২৬ বাংলা ভাষা ও সাহিত্য প্রাক্তন ছাত্র সমিতি। সর্বস্বত্ব সংরক্ষিত।'],
                    'footer.legal_privacy_label' => ['label' => 'Privacy Policy Label', 'type' => 'text', 'default' => 'গোপনীয়তা নীতি'],
                    'footer.legal_privacy_url' => ['label' => 'Privacy Policy URL', 'type' => 'text', 'default' => '#'],
                    'footer.legal_terms_label' => ['label' => 'Terms Label', 'type' => 'text', 'default' => 'ব্যবহারের শর্তাবলী'],
                    'footer.legal_terms_url' => ['label' => 'Terms URL', 'type' => 'text', 'default' => '#'],
                ],
            ],
        ];
    }

    /**
     * The canonical content keys and their default values.
     *
     * @return array<string, string>
     */
    public static function defaults(): array
    {
        $defaults = [];

        foreach (self::sections() as $section) {
            foreach ($section['fields'] as $key => $field) {
                $defaults[$key] = $field['default'];
            }
        }

        return $defaults;
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
