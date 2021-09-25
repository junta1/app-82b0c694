<?php

namespace AppMax\Http\Controllers;

use App\Http\Controllers\Controller;
use AppMax\Http\Resources\ProductHistoryListCollection;
use AppMax\Repositories\ProductHistoryRepository;
use Illuminate\Http\Response;

class ProductHistoryController extends Controller
{
    protected $service;

    public function __construct(ProductHistoryRepository $service)
    {
        $this->service = $service;
    }

    public function index($sku)
    {
        $dados['sku'] = $sku;

        $all = $this->service->all($dados);
        $list = new ProductHistoryListCollection($all);

        return response()->json($list, Response::HTTP_OK);
    }
}
