<?php

namespace App\Http\Controllers;

class CategoryNewsController
{
    use CategoryNewsTrait;

    public function index()
    {
        return view('categoryNews.index', [
            'categoryNews' => $this->getCategoryNews(),
        ]);
    }

    public function show(int $id)
    {
        return view('categoryNews.show', [
            'categoryNews' => $this->getCategoryNews($id),
            ]);
    }
}
