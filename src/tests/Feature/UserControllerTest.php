<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase; // This trait will refresh the database after each test

    public function test_user_can_be_created_successfully_api()
    {
        $userData = [
            'first_name' => 'John Doe',
            'last_name' => 'John Doe',
            'email' => 'john.doe@example.com',
        ];

        $response = $this->postJson('/api/user', $userData); // Use postJson for API requests

        $response->assertStatus(201); // Assert HTTP CREATED (201) status code
    }

    public function test_user_creation_fails_with_validation_errors_api()
    {
        $userData = [
            'first_name' => '', // Missing required field
            'last_name' => '', // Missing required field
            'email' => 'invalid_email',
        ];

        $response = $this->postJson('/api/user', $userData); // Use postJson for API requests

        $response->assertStatus(422); // Assert HTTP UNPROCESSABLE ENTITY (422) status code
    }
}
