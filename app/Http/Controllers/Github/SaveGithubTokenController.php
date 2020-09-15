<?php

namespace App\Http\Controllers\Github;

use App\Http\Controllers\Controller;
use App\Services\GithubService;
use Illuminate\Http\Request;

class SaveGithubTokenController extends Controller
{
    /** @var GithubService */
    private $service;

    public function __construct(GithubService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'token' => 'required|string',
        ]);

        $user = $this->service->saveGithubToken($request->user(), $request->token);

        return response()->json([
            'data' => $user
        ]);
    }
}
