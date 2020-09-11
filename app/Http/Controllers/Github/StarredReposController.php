<?php

namespace App\Http\Controllers\Github;

use App\Http\Controllers\Controller;
use App\Services\GithubApiService;
use Illuminate\Http\Request;

class StarredReposController extends Controller
{
    /** @var GithubApiService */
    private $service;

    public function __construct(GithubApiService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $starredRepos = $this->service->getStarredRepos($request->user()->github_token);

        return response()->json([
            'data' => collect($starredRepos)->map(function ($repo) {
                return [
                    'name' => $repo['name'],
                    'url' => $repo['html_url'],
                ];
            })
        ]);
    }
}
