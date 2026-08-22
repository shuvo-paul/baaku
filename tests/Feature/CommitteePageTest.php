<?php

use App\Committee;

it('serves the committee page', function () {
    $this->get('/committee')
        ->assertOk()
        ->assertSee('বর্তমান কার্যনির্বাহী কমিটি')
        ->assertSee('লাবণ্য');
});

it('shows the top five committee members on the homepage', function () {
    $members = Committee::all();

    $this->get('/')
        ->assertOk()
        ->assertSee($members[0]['name'])
        ->assertSee($members[1]['name'])
        ->assertSee($members[2]['name'])
        ->assertSee($members[3]['name'])
        ->assertSee($members[4]['name'])
        ->assertDontSee('মোঃ আব্দুল করিম');
});

it('renders photos for members with images and initials for the rest', function () {
    $this->get('/committee')
        ->assertSee('/temp/committee/লাবণ্য_.jpg')
        ->assertSee('লিওন');
});

it('renders every committee member from the data file', function () {
    $members = Committee::all();

    $this->get('/committee')
        ->assertSee($members[0]['name'])
        ->assertSee('শূন্য আসন');

    foreach ($members as $member) {
        $this->get('/committee')->assertSee($member['name']);
    }
});
