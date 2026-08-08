<?php

it('serves the blog index', function () {
    $this->get('/blogs')->assertOk()->assertSee('আধুনিক বাংলা কবিতায় নারীর ভাষা');
});
