<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait CategoryNewsTrait
{
    private array $categoryList = [
        [
            "id" => "1",
            "title" => "sport",
            "description" => "Все о спорте"
        ],
        [
            "id" => "2",
            "title" => "politic",
            "description" => "Все о политике"
        ],
        [
            "id" => "3",
            "title" => "art",
            "description" => "Про искусство"
        ]
    ];


    public function getCategoriesNews(int $id = null): array
    {
        $categoryNews = $this->categoryList;
        foreach ($categoryNews as $categoryNew) {
            if ($categoryNew['id'] === $id) {
                return $categoryNew;
            }
        }
     return $this->categoryList;
    }
    public function addCategory(array $category): void
    {

    }

}
