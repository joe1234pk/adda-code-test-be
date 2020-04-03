<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PropertyApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * 
     */
    CONST ROUTE_PREFIX = '/api/properties';

    public function testCreatePropertyMethodConstraintRoute()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->get(SELF::ROUTE_PREFIX.'/create');
        $response->assertStatus(405);
    }

    public function testCreatePropertyMissingRequiredAttrRoute()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->json('post',SELF::ROUTE_PREFIX.'/create',[]);
        $response->assertJson(["error" =>"Create failed"]);
    }

    public function testCreatePropertySucceedRoute()
    {
        $response = $this
        ->withHeaders([
            'Accept' => 'application/json'
        ])
        ->json('POST',SELF::ROUTE_PREFIX.'/create',[
            'suburb' =>'Chatswood',
            'state' =>'NSW',
            'country' =>'Australia']);

        $response->assertStatus(201)->assertJsonStructure(["id"]);
    }

    public function testGetPropertyAnalyticsRoute()
    {
        $response = $this
        ->withHeaders([
            'Accept' => 'application/json'
        ])
        ->json('GET',SELF::ROUTE_PREFIX.'/1/analytics');

        $response->assertStatus(200)->assertJsonStructure(["analytics"]);
    }

    public function testGetPropertyAnalyticsSummaryInSuburbRoute()
    {
        $response = $this
        ->withHeaders([
            'Accept' => 'application/json'
        ])
        ->json('GET',SELF::ROUTE_PREFIX.'/suburbs/Parramatta/analytics');

        $response->assertStatus(200)->assertJsonStructure(["min_val","max_val","median_val","percentage_w_value","percentage_wt_value"]);
    }
    
    public function testGetPropertyAnalyticsSummaryInStateRoute()
    {
        $response = $this
        ->withHeaders([
            'Accept' => 'application/json'
        ])
        ->json('GET',SELF::ROUTE_PREFIX.'/states/nsw/analytics');

        $response->assertStatus(200)->assertJsonStructure(["min_val","max_val","median_val","percentage_w_value","percentage_wt_value"]);
    }

    public function testGetPropertyAnalyticsSummaryInCountryRoute()
    {
        $response = $this
        ->withHeaders([
            'Accept' => 'application/json'
        ])
        ->json('GET',SELF::ROUTE_PREFIX.'/suburbs/australia/analytics');

        $response->assertStatus(200)->assertJsonStructure(["min_val","max_val","median_val","percentage_w_value","percentage_wt_value"]);
    }
}
