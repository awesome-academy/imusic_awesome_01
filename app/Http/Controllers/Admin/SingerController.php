<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SingerRequest;
use App\Repositories\Singer\SingerRepository;
use App\Models\Singer;

class SingerController extends Controller
{
    private $singerRepository;

    public function __construct(SingerRepository $singerRepository)
    {
        $this->singerRepository = $singerRepository;
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $singers = $this->singerRepository->paginate(config('custom.paginate'));

            $response = [
                'pagination' => [
                    'total' => $singers->total(),
                    'per_page' => $singers->perPage(),
                    'current_page' => $singers->currentPage(),
                    'last_page' => $singers->lastPage(),
                    'from' => $singers->firstItem(),
                    'to' =>$singers->lastItem(),
                ],
                'data' => $singers
            ];

            return response()->json($response);
        }

        return view('admin.modules.singer.index');
    }

    public function create()
    {
        return view('admin.modules.singer.form');
    }

    public function store(SingerRequest $request)
    {
        $this->singerRepository->create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description
        ]);

        return response()->json(['msg' => 'Success']);
    }

    public function edit($id)
    {
        $singer = $this->singerRepository->findOrFail($id);

        return view('admin.modules.singer.form', compact('singer'));
    }

    public function update(SingerRequest $request, Singer $singer)
    {
        $this->singerRepository->update($singer, [
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description
        ]);

        return response()->json(['msg' => 'Success']);
    }

    public function destroy(Singer $singer)
    {
        return response()->json($this->singerRepository->delete($singer));
    }
}
