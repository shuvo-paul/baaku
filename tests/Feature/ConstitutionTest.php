<?php

it('serves the hardcoded constitution body', function () {
    $this->get('/constitution')->assertOk()
        ->assertSee('প্রথম অধ্যায়')
        ->assertSee('বাংলা অ্যালামনাই অ্যাসোসিয়েশন')
        ->assertSee('সর্বমোট')
        ->assertDontSee('<p>**</p>')
        ->assertDontSee('obsidian://');
});
