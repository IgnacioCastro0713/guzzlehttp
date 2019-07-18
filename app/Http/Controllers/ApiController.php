<?php

namespace App\Http\Controllers;

use App\repositories\ApiRepository;

class ApiController extends Controller
{

    protected $apiResponse;

    public function __construct(ApiRepository $repository)
    {
        $this->apiResponse = $repository;
    }

    public function index()
    {
        return response()->json($this->apiResponse->getAll());
    }
}
