<?php

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function Laravel\Prompts\text;

class CategoryNewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Categories_News_List_Success(): void
    {
        $response = $this->get(route('admin.categories.index'));
        $response->assertSeeText('Список категорий');
        $response->assertStatus(200);
    }
    public function test_Categories_News_Store_Success(): void
    {
        $testData = [
            'title' => 'title',
            'description' => 'text'
        ];
        $response = $this->post(route('admin.categories.store'), $testData);
        $response->assertStatus(302);
    }
//    public function test_Categories_News_Store_Without_Title(): void
//    {
//        $testData = [
//            'description' => 'text'
//        ];
//        $response = $this->post(route('admin.categories.store'), $testData);
//
//    }
//    public function test_interacting_with_cookies(): void
//    {
//
//    }
}
