<?php

use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;

it('can surf Core table', function (){
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/');

    $response->assertInertia(fn (Assert $page) => $page
        // Checking a root-level property...
        ->component('Welcome')
        ->has('cores')

    );


    $response->assertStatus(200);
});
