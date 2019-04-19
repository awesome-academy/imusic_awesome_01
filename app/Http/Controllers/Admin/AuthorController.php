<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Repositories\Author\AuthorRepository;
use App\Models\Author;

class AuthorController extends Controller
{
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $authors = $this->authorRepository->paginate(config('custom.paginate'));

            $response = [
                'pagination' => [
                    'total' => $authors->total(),
                    'per_page' => $authors->perPage(),
                    'current_page' => $authors->currentPage(),
                    'last_page' => $authors->lastPage(),
                    'from' => $authors->firstItem(),
                    'to' =>$authors->lastItem(),
                ],
                'data' => $authors
            ];

            return response()->json($response);
        }

        return view('admin.modules.author.index');
    }

    public function create()
    {
        return view('admin.modules.author.form');
    }

    public function store(AuthorRequest $request)
    {
        $this->authorRepository->create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description
        ]);

        return response()->json(['msg' => 'Success']);
    }

    public function edit($id)
    {
        $author = $this->authorRepository->findOrFail($id);

        return view('admin.modules.author.form', compact('author'));
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $this->authorRepository->update($author, [
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description
        ]);

        return response()->json(['msg' => 'Success']);
    }

    public function destroy(Author $author)
    {
        return response()->json($this->authorRepository->delete($author));
    }
}
