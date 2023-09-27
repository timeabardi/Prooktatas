<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Session;

class NewRouterTest extends TestCase
{
    public function testPostWelcome(): void
    {
        $response = $this->post('/post_welcome');
        $response->assertStatus(200);
    }
    public function testApi(): void
    {
        $test_api = $this->get('api/api_test');
        $test_api->assertStatus(200);
    }

    public function testActions(): void
    {
        $action_test = $this->get('/actions/1');
        $action_test->assertStatus(200);
    }

    public function testUsername(): void
    {
        $username_test = $this->get('/test_user/jani');
        $username_test->assertStatus(200);
    }

    public function testHello(): void
    {
        $username_test = $this->get('/welcome');
        $username_test->assertStatus(200);
    }
    public function testUsernameShow(): void
    {
        $username_test = $this->get('/username_show/kata');
        $username_test->assertStatus(200);
    }

    public function testRedirect(): void
    {
        $redirect_test = $this->get('/test_redirect');
        $redirect_test->assertRedirect('/admin/cars');
    }

    public function testCars(): void
    {
        $cars_test = $this->get('admin/cars');
        $cars_test->assertStatus(200);
    }
    public function testBmw(): void
    {
        $bmw_test = $this->get('admin/bmw');
        $bmw_test->assertStatus(200);
    }
    public function testMercedes(): void
    {
        $mercedes_test = $this->get('admin/mercedes');
        $mercedes_test->assertStatus(200);
    }
    public function testHonda(): void
    {
        $honda_test = $this->get('admin/honda');
        $honda_test->assertStatus(200);
    }
    public function testVolvo(): void
    {
        $volvo_test = $this->get('admin/volvo');
        $volvo_test->assertStatus(200);
    }
    public function testWelcomeLink(): void
    {
        $volvo_test = $this->get('welcome_link');
        $volvo_test->assertStatus(200);
    }
}
