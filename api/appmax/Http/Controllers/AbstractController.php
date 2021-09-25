<?php

namespace AppMax\Http\Controllers;

use App\Http\Controllers\Controller;
use AppMax\Services\AbstractService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

abstract class AbstractController extends Controller
{
    protected $service;
    protected $storeRequest;
    protected $updateRequest;

    public function __construct(AbstractService $service)
    {
        $this->service = $service;
        $this->storeRequest = '';
        $this->updateRequest = '';
    }

    public function index(Request $request)
    {
        return response()->json($this->service->all($request->all()), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request = ($this->storeRequest ? App::make($this->storeRequest) : $request);

        return response()->json($this->service->save($request->all()), Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->service->find($id), Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $request = ($this->storeRequest ? App::make($this->updateRequest) : $request);

        return response()->json($this->service->update($request->all(), $id), Response::HTTP_OK);
    }

    public function destroy($id)
    {
        return response()->json($this->service->delete($id), Response::HTTP_OK);
    }
}
