<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
  /** @test */
  public function showRegisterPage()
  {
    $response = $this->get('/auth/register');
    $response->assertStatus(200);
  }

  /** @test */
  public function registerSuccess()
  {
    $response = $this->post('/auth/register', [
      'name' => 'test',
      'email' => 'test@test.com',
      'role_id' => 3,
      'password' => 'test',
    ]);
    $response->assertStatus(302);
  }

  /** @test */
  public function registerFailed()
  {
    $response = $this->post('/auth/register', [
      'name' => 'test',
      'email' => 'test',
      'password' => 'test',
    ]);
    $response->assertStatus(302);
  }
}
