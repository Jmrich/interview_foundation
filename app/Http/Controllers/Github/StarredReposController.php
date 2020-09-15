<?php

namespace App\Http\Controllers\Github;

use App\Http\Controllers\Controller;
use App\Services\GithubApiService;
use App\Services\GithubService;
use Illuminate\Http\Request;

class StarredReposController extends Controller
{
    /** @var GithubService */
    private $service;

    public function __construct(GithubService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        return response()->json([
            'data' => $this->service->getStarredRepos($request->user()->github_token),
        ]);
    }
}
