<?php

namespace AppMax\Http\Controllers;

use App\Http\Controllers\Controller;
use AppMax\Http\Requests\Product\StorePostRequest;
use AppMax\Http\Requests\Product\UpdatePostRequest;
use AppMax\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return response()->json($this->service->all($request), Response::HTTP_OK);
    }

    public function store(StorePostRequest $request)
    {
        return response()->json($this->service->save($request->all()), Response::HTTP_CREATED);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        return response()->json($this->service->update($request->all(), $id), Response::HTTP_OK);
    }

    public function destroy($id)
    {
        return response()->json($this->service->delete($id), Response::HTTP_OK);
    }
}
