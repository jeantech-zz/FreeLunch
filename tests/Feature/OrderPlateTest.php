<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class OrderPlateTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateOrderPlateCanRender()
    {
        $data = $this->orderPlateData();
        $response = $this->postJson('/api/createOrderPlate', $data);
        dd($response);

        $response->assertJson(fn (AssertableJson $json) => $json->has('data')->etc());

    }

    public function orderPlateData(): array
    {
        return [
            'countOrder' => 1
        ];
    }
}
