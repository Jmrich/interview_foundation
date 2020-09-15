<?php

namespace App\Services;

use App\User;

class GithubService
{
    /** @var GithubApiService */
    private $service;

    public function __construct(GithubApiService $service)
    {
        $this->service = $service;
    }

    public function getStarredRepos($token)
    {
        return collect($this->service->getStarredRepos($token))
            ->map(function ($repo) {
                return [
                    'name' => $repo['name'],
                    'url' => $repo['html_url'],
                ];
            });
    }

    public function saveGithubToken(User $user, string $token)
    {
        return tap($user, function ($user) use ($token) {
            $user->update([
                'github_token' => $token,
            ]);
        });
    }
}
