<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    public function testListRecipeCanRender()
    {
        $response = $this->get('/api/listRecipe');

        $response->assertStatus(200);
    }
}
