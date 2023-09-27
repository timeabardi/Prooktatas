<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Session;

class UserRouterTest extends TestCase
{
   
    public function testUserList(): void
    {
        $response = $this->get('/users/list');

        $response->assertStatus(200);
    }

    public function testUserDatatable(): void
    {
        $response = $this->get('/users/datatable');

        $response->assertStatus(200);
    }

    public function testUserAddProcess(): void
    {
        $response = $this->post('api/users/add-process');
        $response->assertStatus(200);

        // Session::start();
        // $response = $this -> withHeaders([
        //     'X-CSRF-TOKEN' => csrf_token(),
        // ])->json('POST', '/users/add-process', [
        //     'name' => 'Test User',
        //     'email' => 'test@user.hu',
        //     'password' => '123456',
        // ]);

        // $response = $this->post('/users/add-process');

        // $response->assertStatus(200);
    }
}
