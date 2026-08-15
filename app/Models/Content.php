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
     * @return array<string, array{label: string, fields: array<string, array{label: string, type: 'text'|'textarea', default: string}|array{type: 'link', label: string, label_key: string, url_key: string, default_label: string, default_url: string}>}>
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
                    'hero.cta_primary' => [
                        'type' => 'link',
                        'label' => 'Primary Button',
                        'label_key' => 'hero.cta_primary_label',
                        'url_key' => 'hero.cta_primary_url',
                        'default_label' => 'সদস্য হোন',
                        'default_url' => '/register',
                    ],
                    'hero.cta_secondary' => [
                        'type' => 'link',
                        'label' => 'Secondary Button',
                        'label_key' => 'hero.cta_secondary_label',
                        'url_key' => 'hero.cta_secondary_url',
                        'default_label' => 'আরও জানুন',
                        'default_url' => '#about',
                    ],
                ],
            ],
            'about' => [
                'label' => 'About',
                'fields' => [
                    'about.eyebrow' => ['label' => 'Eyebrow', 'type' => 'text', 'default' => 'About Us'],
                    'about.heading' => ['label' => 'Heading', 'type' => 'textarea', 'default' => 'বাংলা সাহিত্যের ঐতিহ্য বহনকারী একটি সম্প্রদায়'],
                    'about.body_1' => ['label' => 'Paragraph 1', 'type' => 'textarea', 'default' => 'আমাদের সমিতি ১৯৮৫ সালে প্রতিষ্ঠিত হয়েছিল বাংলা ভাষা ও সাহিত্য বিভাগের প্রাক্তন ছাত্রদের একটি সেতুবন্ধন হিসেবে। আজ আমরা ৫০০+ সদস্য নিয়ে বাংলা সাহিত্য, সংস্কৃতি ও শিক্ষার প্রসারে কাজ করে যাচ্ছি।'],
                    'about.body_2' => ['label' => 'Paragraph 2', 'type' => 'textarea', 'default' => 'আমরা বিশ্বাস করি বাংলা ভাষা ও সাহিত্য আমাদের জাতীয় পরিচয়ের মূল ভিত্তি। এই ভিত্তিকে শক্তিশালী করতে আমরা সাহিত্য আলোচনা, সেমিনার, প্রকাশনা এবং সাংস্কৃতিক অনুষ্ঠানের আয়োজন করি।'],
                    'about.cta' => [
                        'type' => 'link',
                        'label' => 'Button',
                        'label_key' => 'about.cta_label',
                        'url_key' => 'about.cta_url',
                        'default_label' => 'বিস্তারিত জানুন',
                        'default_url' => '#',
                    ],
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
                    'announcement.cta' => [
                        'type' => 'link',
                        'label' => 'Link',
                        'label_key' => 'announcement.cta_label',
                        'url_key' => 'announcement.cta_url',
                        'default_label' => 'বিস্তারিত জানুন',
                        'default_url' => '#',
                    ],
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
                    'cta.primary' => [
                        'type' => 'link',
                        'label' => 'Primary Button',
                        'label_key' => 'cta.primary_label',
                        'url_key' => 'cta.primary_url',
                        'default_label' => 'সদস্যপদ আবেদন',
                        'default_url' => '#',
                    ],
                    'cta.secondary' => [
                        'type' => 'link',
                        'label' => 'Secondary Button',
                        'label_key' => 'cta.secondary_label',
                        'url_key' => 'cta.secondary_url',
                        'default_label' => 'যোগাযোগ করুন',
                        'default_url' => '#',
                    ],
                ],
            ],
            'nav' => [
                'label' => 'Navigation',
                'fields' => [
                    'nav.brand' => ['label' => 'Brand Name', 'type' => 'text', 'default' => 'বাকু'],
                    'nav.home' => [
                        'type' => 'link',
                        'label' => 'Home',
                        'label_key' => 'nav.home_label',
                        'url_key' => 'nav.home_url',
                        'default_label' => 'হোম',
                        'default_url' => '#home',
                    ],
                    'nav.about' => [
                        'type' => 'link',
                        'label' => 'About',
                        'label_key' => 'nav.about_label',
                        'url_key' => 'nav.about_url',
                        'default_label' => 'পরিচিতি',
                        'default_url' => '#about',
                    ],
                    'nav.events' => [
                        'type' => 'link',
                        'label' => 'Events',
                        'label_key' => 'nav.events_label',
                        'url_key' => 'nav.events_url',
                        'default_label' => 'ইভেন্ট',
                        'default_url' => '#events',
                    ],
                    'nav.contact' => [
                        'type' => 'link',
                        'label' => 'Contact',
                        'label_key' => 'nav.contact_label',
                        'url_key' => 'nav.contact_url',
                        'default_label' => 'যোগাযোগ',
                        'default_url' => '#contact',
                    ],
                ],
            ],
            'footer' => [
                'label' => 'Footer',
                'fields' => [
                    'footer.heading' => ['label' => 'Heading', 'type' => 'textarea', 'default' => 'আমরা সবসময় আপনার পাশে'],
                    'footer.quick_links_heading' => ['label' => 'Quick Links Heading', 'type' => 'text', 'default' => 'দ্রুত লিংক'],
                    'footer.quick_link_1' => [
                        'type' => 'link',
                        'label' => 'Quick Link 1',
                        'label_key' => 'footer.quick_link_1_label',
                        'url_key' => 'footer.quick_link_1_url',
                        'default_label' => 'হোম',
                        'default_url' => '#home',
                    ],
                    'footer.quick_link_2' => [
                        'type' => 'link',
                        'label' => 'Quick Link 2',
                        'label_key' => 'footer.quick_link_2_label',
                        'url_key' => 'footer.quick_link_2_url',
                        'default_label' => 'আমাদের সম্পর্কে',
                        'default_url' => '#about',
                    ],
                    'footer.quick_link_3' => [
                        'type' => 'link',
                        'label' => 'Quick Link 3',
                        'label_key' => 'footer.quick_link_3_label',
                        'url_key' => 'footer.quick_link_3_url',
                        'default_label' => 'ইভেন্ট',
                        'default_url' => '#events',
                    ],
                    'footer.contact_heading' => ['label' => 'Contact Heading', 'type' => 'text', 'default' => 'যোগাযোগ'],
                    'footer.address' => ['label' => 'Address', 'type' => 'textarea', 'default' => 'বাংলা বিভাগ, খুলনা বিশ্ববিদ্যালয়, খুলনা-৯১০০'],
                    'footer.email' => ['label' => 'Email', 'type' => 'text', 'default' => 'info@banglaalumni.org'],
                    'footer.phone' => ['label' => 'Phone', 'type' => 'text', 'default' => '+880 1700-000000'],
                    'footer.membership_heading' => ['label' => 'Membership Heading', 'type' => 'text', 'default' => 'সদস্যপদ'],
                    'footer.membership_link_1' => [
                        'type' => 'link',
                        'label' => 'Membership Link 1',
                        'label_key' => 'footer.membership_link_1_label',
                        'url_key' => 'footer.membership_link_1_url',
                        'default_label' => 'সদস্য হোন',
                        'default_url' => '#',
                    ],
                    'footer.membership_link_2' => [
                        'type' => 'link',
                        'label' => 'Membership Link 2',
                        'label_key' => 'footer.membership_link_2_label',
                        'url_key' => 'footer.membership_link_2_url',
                        'default_label' => 'সদস্য তালিকা',
                        'default_url' => '#',
                    ],
                    'footer.membership_link_3' => [
                        'type' => 'link',
                        'label' => 'Membership Link 3',
                        'label_key' => 'footer.membership_link_3_label',
                        'url_key' => 'footer.membership_link_3_url',
                        'default_label' => 'সদস্য সুবিধা',
                        'default_url' => '#',
                    ],
                    'footer.membership_link_4' => [
                        'type' => 'link',
                        'label' => 'Membership Link 4',
                        'label_key' => 'footer.membership_link_4_label',
                        'url_key' => 'footer.membership_link_4_url',
                        'default_label' => 'বার্ষিক সমাবেশ',
                        'default_url' => '#',
                    ],
                    'footer.social_heading' => ['label' => 'Social Heading', 'type' => 'text', 'default' => 'সামাজিক যোগাযোগ'],
                    'footer.social_facebook_url' => ['label' => 'Facebook URL', 'type' => 'text', 'default' => '#'],
                    'footer.social_youtube_url' => ['label' => 'YouTube URL', 'type' => 'text', 'default' => '#'],
                    'footer.social_linkedin_url' => ['label' => 'LinkedIn URL', 'type' => 'text', 'default' => '#'],
                    'footer.copyright' => ['label' => 'Copyright', 'type' => 'text', 'default' => '© ২০২৬ বাংলা ভাষা ও সাহিত্য প্রাক্তন ছাত্র সমিতি। সর্বস্বত্ব সংরক্ষিত।'],
                    'footer.legal_privacy' => [
                        'type' => 'link',
                        'label' => 'Privacy Policy',
                        'label_key' => 'footer.legal_privacy_label',
                        'url_key' => 'footer.legal_privacy_url',
                        'default_label' => 'গোপনীয়তা নীতি',
                        'default_url' => '#',
                    ],
                    'footer.legal_terms' => [
                        'type' => 'link',
                        'label' => 'Terms',
                        'label_key' => 'footer.legal_terms_label',
                        'url_key' => 'footer.legal_terms_url',
                        'default_label' => 'ব্যবহারের শর্তাবলী',
                        'default_url' => '#',
                    ],
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
                if ($field['type'] === 'link') {
                    $defaults[$field['label_key']] = $field['default_label'];
                    $defaults[$field['url_key']] = $field['default_url'];

                    continue;
                }

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
