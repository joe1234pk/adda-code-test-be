<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnalyticApiTest extends TestCase
{
    CONST ROUTE_PREFIX = '/api/property-analtyic';

    public function testCreateAnaltyicMethodConstraintRoute()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->get(SELF::ROUTE_PREFIX.'/create');
        $response->assertStatus(405);
    }

    public function testCreateAnaltyicMissingRequiredAttrRoute()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->json('post',SELF::ROUTE_PREFIX.'/create',[]);
        $response->assertJson(["error" =>"Create failed"]);
    }

    public function testCreateAnaltyicInvalidRequiredAttrRoute()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->json('post',SELF::ROUTE_PREFIX.'/create',[
            'property_id' =>'N/A',
            'analytic_type_id' =>'1',
            'value' =>''
        ]);
        $response->assertJson(["error" =>"Create failed"]);
    }
    public function testCreateAnaltyicSucceedRoute()
    {
        $response = $this
        ->withHeaders([
            'Accept' => 'application/json'
        ])
        ->json('POST',SELF::ROUTE_PREFIX.'/create',[
            'property_id' =>'1',
            'analytic_type_id' =>'1',
            'value' =>'']);

        $response->assertStatus(201)->assertJsonStructure(["id"]);
    }

    public function testUpdateAnaltyicSucceedRoute()
    {
        $response = $this
        ->withHeaders([
            'Accept' => 'application/json'
        ])
        ->json('PUT',SELF::ROUTE_PREFIX.'/update/1',[
            'property_id' =>'1',
            'analytic_type_id' =>'1',
            'value' =>'']);

        $response->assertStatus(200)->assertJsonStructure(["id"]);
    }
}
