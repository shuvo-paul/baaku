<?php

declare(strict_types=1);
use Alumkit\Alumkit\Enums\UserState;

return [

    'auth' => [

        'user_model' => 'App\\Models\\User',

    ],

    'seeder' => [
        'admin_name' => env('ALUMKIT_ADMIN_NAME', 'Admin'),
        'admin_email' => env('ALUMKIT_ADMIN_EMAIL', 'admin@example.com'),
        'admin_password' => env('ALUMKIT_ADMIN_PASSWORD', 'password'),
    ],

    'default_state' => UserState::Pending,

    'permission' => [
        'default_roles' => ['admin', 'moderator', 'member'],
        /*
        |-----------------------------------------------------------------------
        | Permissions
        |-----------------------------------------------------------------------
        | Add your app-specific permissions here. Package permissions (defined
        | in Alumkit::PERMISSIONS) are always seeded and cannot be removed.
        */
        'permissions' => ['manage content'],
    ],

    'dashboard_nav' => [
        [
            'label' => 'Pages & Sections',
            'permission' => 'manage content',
            'children' => [
                ['label' => 'Homepage', 'route' => 'alumkit.content.hero'],
                ['label' => 'About', 'route' => 'alumkit.content.about'],
                ['label' => 'Announcement', 'route' => 'alumkit.content.announcement'],
                ['label' => 'Impact Stats', 'route' => 'alumkit.content.stats'],
                ['label' => 'Call to Action', 'route' => 'alumkit.content.cta'],
                ['label' => 'Navigation', 'route' => 'alumkit.content.nav'],
                ['label' => 'Footer', 'route' => 'alumkit.content.footer'],
            ],
        ],
        // A link:            ['label' => 'Events', 'route' => 'events.index', 'permission' => 'manage events']
        // permission is optional; omitted -> visible to all authenticated users.
        // A group:           ['label' => 'Settings', 'permission' => 'manage settings', 'children' => [
        //                         ['label' => 'General', 'route' => 'settings.general'],
        //                     ]]
        // group permission is optional and guards the whole group; child permission guards one child.
        // One level of nesting; groups cannot contain groups.
    ],

    'education' => [
        'levels' => ['Honors', 'Masters', 'PhD', 'Diploma', 'Certificate'],

        'institutions' => [
            'University of Khulna',
            'Bangabandhu Sheikh Mujib Medical University (BSMMU)',
            'Bangabandhu Sheikh Mujibur Rahman Agricultural University',
            'Bangabandhu Sheikh Mujibur Rahman Digital University',
            'Bangabandhu Sheikh Mujibur Rahman Maritime University',
            'Bangabandhu Sheikh Mujibur Rahman Science and Technology University',
            'Bangabandhu Sheikh Mujibur Rahman University, Kishoreganj',
            'Bangamata Sheikh Fojilatunnesa Mujib Science & Technology University',
            'Bangladesh Agricultural University',
            'Bangladesh Open University',
            'Bangladesh University of Engineering and Technology (BUET)',
            'Bangladesh University of Professionals (BUP)',
            'Bangladesh University of Textiles',
            'Barishal University',
            'Begum Rokeya University, Rangpur',
            'Chittagong University of Engineering & Technology (CUET)',
            'Comilla University',
            'Dhaka University of Engineering & Technology (DUET)',
            'Gopalganj Science and Technology University',
            'Hajee Mohammad Danesh Science and Technology University',
            'Islamic Arabic University',
            'Islamic University, Kushtia',
            'Jagannath University',
            'Jahangirnagar University',
            'Jashore University of Science and Technology',
            'Jatiya Kabi Kazi Nazrul Islam University',
            'Khulna University of Engineering & Technology (KUET)',
            'Khulna Agricultural University',
            'Kurigram Agricultural University',
            'Military Institute of Science and Technology (MIST)',
            'National University',
            'Noakhali Science and Technology University',
            'Pabna University of Science and Technology',
            'Patuakhali Science and Technology University',
            'Rabindra University, Bangladesh',
            'Rajshahi University of Engineering & Technology (RUET)',
            'Shahjalal University of Science and Technology',
            'Sheikh Hasina University',
            'Sher-e-Bangla Agricultural University',
            'Sylhet Agricultural University',
            'University of Chittagong',
            'University of Dhaka',
            'University of Rajshahi',
        ],
        'subjects' => [
            'Bangla',
            'Accounting',
            'Agronomy',
            'Agroforestry',
            'Anthropology',
            'Arabic',
            'Architecture',
            'Banking and Insurance',
            'Biochemistry',
            'Biomedical Engineering',
            'Biotechnology',
            'Botany',
            'Chemical Engineering',
            'Chemistry',
            'Civil Engineering',
            'Computer Science and Engineering',
            'Criminology',
            'Data Science',
            'Dentistry (BDS)',
            'Development Studies',
            'Drawing and Painting',
            'Economics',
            'Education',
            'Electrical and Electronic Engineering',
            'Electronics and Communication Engineering',
            'English',
            'Entomology',
            'Environmental Science',
            'Finance',
            'Fine Arts',
            'Fisheries',
            'Food Engineering',
            'Food Science and Technology',
            'Forensic Science',
            'Gender and Development Studies',
            'Genetic Engineering and Biotechnology',
            'Geography and Environment',
            'Geology',
            'Graphic Design',
            'History',
            'Horticulture',
            'Human Resource Management',
            'Industrial and Production Engineering',
            'Information Technology',
            'International Relations',
            'Islamic History and Culture',
            'Islamic Studies',
            'Law (LL.B)',
            'Linguistics',
            'Management',
            'Marketing',
            'Mass Communication and Journalism',
            'Materials Science and Engineering',
            'Mathematics',
            'Mechanical Engineering',
            'Mechatronics Engineering',
            'Medicine (MBBS)',
            'Microbiology',
            'Molecular Biology',
            'Music',
            'Naval Architecture and Marine Engineering',
            'Nursing',
            'Nutrition and Food Science',
            'Oceanography',
            'Peace and Conflict Studies',
            'Petroleum and Mining Engineering',
            'Pharmacy',
            'Philosophy',
            'Physical Education',
            'Physics',
            'Plant Pathology',
            'Political Science',
            'Population Sciences',
            'Psychology',
            'Public Administration',
            'Public Health',
            'Poultry Science',
            'Robotics and Mechatronics Engineering',
            'Sanskrit',
            'Sociology',
            'Software Engineering',
            'Soil Science',
            'Statistics',
            'Textile Engineering',
            'Theater and Performance Studies',
            'Tourism and Hospitality Management',
            'Urban and Regional Planning',
            'Women and Gender Studies',
            'Zoology',
        ],
    ],

];
