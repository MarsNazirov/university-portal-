<?php

test('guest cannot access admin dashboard', function () {
    $response = $this->get('/admin');

    $response->assertStatus(302);
    $response->assertRedirect(route('login'));
});


