<?php

namespace App\Http\Controllers;

trait CategoryNewsTrait
{
    use NewsTrait;
    public function getCategoryNews(int $category = null): array
    {

        $categoryNews = [];
        $quantityCategory = 5;
        if($category === null) {
            for($i = 1; $i <= $quantityCategory; $i++) {
                $categoryNews[$i] =
                    [
                        "id" => $i,
                        "title" => fake()->title(),
                        "description" => fake()->text(15),
                    ];
            }
            return $categoryNews;
        }
        return [
            'id' => $category,
            'title' => fake()->title,
            'description' => fake()->text(15),
        ];
    }
}
