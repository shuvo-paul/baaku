<?php

it('renders hardcoded hero content', function () {
    $this->get('/')->assertOk()
        ->assertSee('Est. 2024')
        ->assertSee('বাংলা অ্যালামনাই অ্যাসোসিয়েশন')
        ->assertSee('সদস্য হোন')
        ->assertSee('প্রবেশ করুন');
});

it('renders hardcoded section defaults', function () {
    $this->get('/')->assertOk()
        ->assertSee('About Us')
        ->assertSee('ঘোষণা')
        ->assertSee('Our Impact')
        ->assertSee('Join Us')
        ->assertSee('দ্রুত লিংক');
});
