<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DefaultApiTest extends TestCase
{
    public function testHomeRoute()
    {
     
        $response = $this->get('/');
        // withHeader
        $response->assertStatus(200)->assertExactJson(['msg' =>'Welcome']);
    }

    public function testNotFoundRoute()
    {
     
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->get('api/test');
        // 
        $response->assertStatus(404)->assertJson(['error'=>'Not Found']);
    }
}
