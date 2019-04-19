<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Category\CategoryRepository;
use App\Models\Category;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $categorys = $this->categoryRepository->paginate(config('custom.paginate'));

            $response = [
                'pagination' => [
                    'total' => $categorys->total(),
                    'per_page' => $categorys->perPage(),
                    'current_page' => $categorys->currentPage(),
                    'last_page' => $categorys->lastPage(),
                    'from' => $categorys->firstItem(),
                    'to' =>$categorys->lastItem(),
                ],
                'data' => $categorys
            ];

            return response()->json($response);
        }

        return view('admin.modules.category.index');
    }

    public function create()
    {
        return view('admin.modules.category.form');
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description
        ]);

        return response()->json(['msg' => 'Success']);
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->findOrFail($id);

        return view('admin.modules.category.form', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryRepository->update($category, [
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description
        ]);

        return response()->json(['msg' => 'Success']);
    }

    public function destroy(Category $category)
    {
        return response()->json($this->categoryRepository->delete($category));
    }
}
