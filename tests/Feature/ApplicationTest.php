<?php

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Support\Facades\Queue;

test('student can create an application', function () {

    Queue::fake();

    $user = User::factory()->create();

    $faculty = Faculty::create([
        'name' => 'Test Faculty',
        'description' => 'Desc',
        'budget_places' => 10,
        'education_years' => 4
    ]);

    $response = $this->actingAs($user)
                ->post(route('applications.store', $faculty), [
                    'score' => 250,
                    'message' => 'Хочу к вам!',
                    'faculty_id' => $faculty->id
                ]);

    $response->assertRedirect();

    $response->assertSessionHasNoErrors();

    $this->assertDatabaseHas('applications', [
        'user_id' => $user->id,
        'faculty_id' => $faculty->id,
        'score' => 250,
        'message' => 'Хочу к вам!'
    ]);

});


