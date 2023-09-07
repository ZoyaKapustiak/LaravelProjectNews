<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class NewsController extends Controller
{
    use NewsTrait;

    public function index(): View
    {

        return \view('news.index', [
            'newsList' => $this->getNews(),
        ]);
    }

    public function show(int $id): View
    {
        return \view('news.show', [
            'news' => $this->getNews($id),
        ]);
//        return $this->getNews($id);
    }
}
