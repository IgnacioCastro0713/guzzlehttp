<?php

namespace App\Http\Controllers;

use App\repositories\ApiRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    protected $apiResponse;

    public function __construct(ApiRepository $repository)
    {
        $this->apiResponse = $repository;
    }

    public function index()
    {
        return response()->json($this->apiResponse->all());
    }

    public function store(Request $request)
    {
        $response = $this->apiResponse->post($request->all());
        return $response->getBody();
    }
}
