<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CreateRequest;
use App\Http\Requests\Admin\Categories\Edit;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $newsCategories = Category::query()->paginate(10);

        return \view('admin.categories.index', [
            'categoriesNewsList' => $newsCategories,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return \view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse //??
    {
        $request->flash();
        $data = $request->only('title', 'description');

        $category = new Category($data);
        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно сохранена');
        }
        return back()->with('error', 'Не удалось добавить запись');

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
    public function edit(Category $category): View
    {
        return \view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateRequest $request, Category $category)
    {
        $data = $request->only(['title', 'description']);
        $category->fill($data);
        if($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->delete()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория успешно удалена');
        }
        return redirect()->route('admin.categories.index')
            ->with('error', 'Категория не удалена');
    }
}
