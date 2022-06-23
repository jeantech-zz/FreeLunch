<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderWarehouseTest extends TestCase
{
    use RefreshDatabase;

    public function testListOrderWarehouseCanRender()
    {
        $response = $this->get('/api/listWarehouse');

        $response->assertStatus(200);
    }
}
