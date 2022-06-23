<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderBuyTest extends TestCase
{
    use RefreshDatabase;

    public function testListOrderBuyCanRender()
    {
        $response = $this->get('/api/listOrderBuys');

        $response->assertStatus(200);
    }
}
