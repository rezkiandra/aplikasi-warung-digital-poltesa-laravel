<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
  /** @test */
  public function showLoginPage()
  {
    $response = $this->get('/auth/login');
    $response->assertStatus(200);
  }

  /** @test */
  public function loginIncorrectCredentials()
  {
    $response = $this->post('/auth/login', [
      'email' => 'rezki@admin.com',
      'password' => 'rezki',
      'role_id' => 1
    ]);
    $response->assertStatus(302);
  }

  /** @test */
  public function loginCorrectCredentials()
  {
    $response = $this->post('/auth/login', [
      'email' => 'rezki@admin.com',
      'password' => 'rezki123',
      'role_id' => 1
    ]);
    $response->assertStatus(302);
  }

  /** @test */
  public function logout()
  {
    $response = $this->get('/auth/logout');
    $response->assertStatus(302);
  }
}
