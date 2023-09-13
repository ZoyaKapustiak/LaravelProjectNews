<?php

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_News_List_Success(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
        $response->assertSeeText('Список новостей');
    }
    public function test_News_Store_Success(): void
    {
        $testData = [
          'title' => 'title',
          'author' => 'Zoia',
          'status' => 'ACTIVE',
            'description' => 'description',
        ];
        $response = $this->post(route('admin.news.store'), $testData);
        $response->assertStatus(302);
    }
}
