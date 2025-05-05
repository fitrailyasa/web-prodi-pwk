<?php

namespace Tests\Feature;

use App\Models\Alumni;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumniControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_paginated_alumni_data_to_inertia_component()
    {
        // Arrange: buat 15 data alumni
        $user = \App\Models\User::factory()->create(['id' => 1]);
        Alumni::factory()->count(15)->create(['user_id' => $user->id]);

        // Act
        $response = $this->get(route('profile.alumni'));

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) =>
            $page->component('Profile/Alumni')
                ->where('title', __('Alumni PWK ITERA'))
                ->has('alumni.data', 12) // karena paginate(12)
                ->has('alumni.current_page')
                ->has('alumni.last_page')
                ->has('alumni.total')
        );
    }

    /** @test */
    public function it_returns_empty_alumni_data_if_none_exists()
    {
        // Act
        $response = $this->get(route('profile.alumni'));

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) =>
            $page->component('Profile/Alumni')
                ->where('title', __('Alumni PWK ITERA'))
                ->where('alumni.data', [])
                ->where('alumni.total', 0)
        );
    }
}
