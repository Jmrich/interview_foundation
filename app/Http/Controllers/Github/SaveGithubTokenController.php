<?php

namespace App\Http\Controllers\Github;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaveGithubTokenController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'token' => 'required|string',
        ]);

        $user = $request->user();

        $user->update([
            'github_token' => $request->token,
        ]);

        return response()->json([
            'data' => $user
        ]);
    }
}
