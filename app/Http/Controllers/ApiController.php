<?php

namespace App\Http\Controllers;

use App\repositories\ApiRepository;

class ApiController extends Controller
{

    protected $guzzleResponse;

    public function __construct(ApiRepository $repository)
    {
        $this->guzzleResponse = $repository;
    }

    public function index()
    {
        return response()->json($this->guzzleResponse->getAll());
    }
}
