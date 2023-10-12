<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\Category;
use App\Models\News;
use App\Models\Resources;
use App\Services\Interfaces\ParserInterface;
use App\Services\ParserService;
use Illuminate\Http\Request;


class ParserController extends Controller
{
    public function __invoke(Request $request, ParserInterface $parserService)
    {
        $urls = Resources::all();
//        $urls = [
//            "https://lenta.ru/rss",
//            "https://news.rambler.ru/rss/world",
//            "https://news.rambler.ru/rss/politics",
//            ];
        foreach ($urls as $url) {
            dispatch(new NewsParsingJob($url->url));
        }
        return redirect(route('admin.news.index'));

//

//
//            News::FirstOrCreate([
//            'title' => $category['title'],
//            'author' => $category['author'],
//            'img' => $category['enclosure::url'],
//            'status' => fake()->randomElement(Status::getEnums()),
//            'description' => $category['description'],
//            'category_id' => $cat->id,
//            'created_at' => now(),
//        ]);
//        }
    }
}
