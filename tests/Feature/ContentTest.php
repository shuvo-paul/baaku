<?php

use Alumkit\Alumkit\Enums\EducationLevel;
use Alumkit\Alumkit\Enums\EmploymentType;
use Alumkit\Alumkit\Enums\UserState;
use App\Models\Content;
use App\Models\User;
use Database\Seeders\ContentSeeder;
use Spatie\Permission\Models\Permission;

function contentManagerUser(): User
{
    $user = User::factory()->create(['state' => UserState::Active->value]);
    $user->givePermissionTo(Permission::findOrCreate('manage content'));
    $user->educations()->create([
        'level' => EducationLevel::Honors->value,
        'institution' => 'Dhaka University',
        'start_year' => 2010,
    ]);
    $user->careers()->create([
        'job_title' => 'Teacher',
        'company' => 'Example School',
        'employment_type' => EmploymentType::FullTime->value,
        'start_year' => 2015,
        'is_current' => true,
    ]);

    return $user;
}

it('renders hero values from the database', function () {
    Content::create(['key' => 'hero.headline', 'value' => 'ডায়নামিক হেডলাইন']);

    $this->get('/')->assertOk()->assertSee('ডায়নামিক হেডলাইন');
});

it('renders default hero values without seeding', function () {
    $this->get('/')->assertOk()->assertSee('Est. 2024');
});

it('renders the seeded hero defaults', function () {
    $this->seed(ContentSeeder::class);

    $this->get('/')->assertOk()->assertSee('Est. 2024');
});

it('shows all hero fields in the dashboard without seeding', function () {
    $this->actingAs(contentManagerUser())
        ->get(route('alumkit.content.hero'))
        ->assertOk()
        ->assertSee('contents[hero.headline]')
        ->assertSee('Est. 2024')
        ->assertSee('resources/css/app.css');
});

it('renders link popup fields with current values', function () {
    $this->actingAs(contentManagerUser())
        ->get(route('alumkit.content.hero'))
        ->assertOk()
        ->assertSee('Primary Button')
        ->assertSee('contents[hero.cta_primary_label]')
        ->assertSee('contents[hero.cta_primary_url]')
        ->assertSee('সদস্য হোন')
        ->assertSee('#join');
});

it('renders every content section page without seeding', function () {
    foreach (['hero', 'about', 'announcement', 'stats', 'cta', 'nav', 'footer'] as $section) {
        $this->actingAs(contentManagerUser())
            ->get(route("alumkit.content.$section"))
            ->assertOk()
            ->assertSee('Save Section');
    }
});

it('renders homepage section defaults without seeding', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('About Us')
        ->assertSee('ঘোষণা')
        ->assertSee('Our Impact')
        ->assertSee('Join Us')
        ->assertSee('দ্রুত লিংক');
});

it('lets a permitted user edit content and updates the homepage', function () {
    $this->actingAs(contentManagerUser())
        ->put(route('alumkit.content.update'), [
            'contents' => ['hero.headline' => 'নতুন হেডলাইন'],
        ])
        ->assertRedirect(route('alumkit.content.hero'));

    $this->assertDatabaseHas('contents', ['key' => 'hero.headline', 'value' => 'নতুন হেডলাইন']);

    $this->get('/')->assertSee('নতুন হেডলাইন');
});

it('forbids users without the manage content permission', function () {
    $user = User::factory()->create(['state' => UserState::Active->value]);
    $user->educations()->create([
        'level' => EducationLevel::Honors->value,
        'institution' => 'Dhaka University',
        'start_year' => 2010,
    ]);
    $user->careers()->create([
        'job_title' => 'Teacher',
        'company' => 'Example School',
        'employment_type' => EmploymentType::FullTime->value,
        'start_year' => 2015,
        'is_current' => true,
    ]);

    $this->actingAs($user)->get(route('alumkit.content.hero'))->assertForbidden();
});
