<?php

use App\Models\User;

it('can surf Core index', function (){
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/');

    $response->assertOk();
});
