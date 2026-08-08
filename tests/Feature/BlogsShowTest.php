<?php

it('serves the single post page', function () {
    $this->get('/blogs/featured')->assertOk()->assertSee('আধুনিক বাংলা কবিতায় নারীর ভাষা');
});
