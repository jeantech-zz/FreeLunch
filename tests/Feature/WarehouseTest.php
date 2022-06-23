<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WarehouseTest extends TestCase
{
    use RefreshDatabase;

    public function testWarehouseCanRender()
    {
        $response = $this->get('/api/listWarehouse');

        $response->assertStatus(200);
    }
}
