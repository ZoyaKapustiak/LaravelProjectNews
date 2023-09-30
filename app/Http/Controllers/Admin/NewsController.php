<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\CreateRequest;
use App\Http\Requests\Admin\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use function PHPUnit\Framework\returnCallback;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $newsList = News::query()
            ->status()         //scope для фильтра
            ->with('category')
            ->orderByDesc('id')
            ->paginate(6);
        $newsList->withQueryString();

        return \view('admin.news.index', ['newsList' => $newsList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categoryList = Category::all();

        return \view('admin.news.create', ['categories' => $categoryList]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
//        $request->flash();
        $data = $request->only(['category_id', 'title', 'author', 'img', 'status', 'description']);

        $name = null;
        if($request->file('img')) {
            $path = Storage::putFile('public/images/news', $request->file('img'));
            $name = Storage::url($path);
            dd($name);
        }
        $data['img'] = $name;

        $news = new News($data);

        if($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');


//        $url = null;
//        if($request->file('img')) {
//            $path = Storage::putFile('public/images', $request->file('img'));
//            $url = Storage::path($path);
//        }

//
//        $imgPath = 'storage/' . $request->file('img')->store('images');
//
////        dump($imgPath);
////        $imgPath = storage_path( $request->file('img')->store('images'));
//        $categoryIdList = DB::table('categories')->select('categories.id', 'categories.title')->get();
//
//        DB::table('news')->insert([
//            'category_id' => $news['category_id'],
//            'title' => $news['title'],
//            'author' => $news['author'],
//            'status' => $news['status'],
//            'description' => $news['description'],
//            'img' => $imgPath,
//            'created_at' => now(),
//        ]);
//        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): View
    {
        $categories = Category::all();

        return \view('admin.news.edit', [
            'categories' => $categories,
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, News $news)
    {
        $data = $request->only(['category_id', 'title', 'author', 'img', 'status', 'description']);
        $name = null;
        if ($request->file('img')) {
            $request->validate([
                'img' => ['sometimes','image', 'mimes:jpeg,bmp,png, |max:1500']
            ]);
            $path = Storage::putFile('public/images/news', $request->file('img'));
            $name = Storage::url($path);
        }
        $data['img'] = $name;
        $news->fill($data);
        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно изменена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if ($news->delete()) {
            return \redirect()->route('admin.news.index')->with('success', 'Запись успешно удалена');
        }
        return \redirect()->route('admin.news.index')->with('error', 'Запись не удалена');
    }
}
