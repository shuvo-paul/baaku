<?php

it('serves the blog index', function () {
    $this->get('/blogs')->assertOk()
        ->assertSee('প্রযুক্তি নির্ভর শিক্ষার প্রসারে নতুন মাইলফলক')
        ->assertSee('/blogs/computer-lab-udbodhon');
});
