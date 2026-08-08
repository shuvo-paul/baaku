<?php

use App\Posts;

it('serves a post by slug', function () {
    $this->get('/blogs/computer-lab-udbodhon')->assertOk()
        ->assertSee('প্রযুক্তি নির্ভর শিক্ষার প্রসারে নতুন মাইলফলক');
});

it('returns 404 for an unknown slug', function () {
    $this->get('/blogs/does-not-exist')->assertNotFound();
});

it('serves every post from the data file', function () {
    foreach (Posts::all() as $post) {
        $this->get('/blogs/'.$post['slug'])->assertOk();
    }
});
