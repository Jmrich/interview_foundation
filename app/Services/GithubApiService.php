<?php

namespace App\Services;

use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Support\Facades\Log;

class GithubApiService
{
    /** @var GitHubManager */
    private $manager;

    public function __construct(GitHubManager $manager)
    {
        $this->manager = $manager;
    }

    public function getStarredRepos(string $token)
    {
        $client = $this->manager->getFactory()->make([
            'method'     => 'token',
            'token'      => $token,
            // 'backoff'    => false,
            // 'cache'      => false,
            // 'version'    => 'v3',
            // 'enterprise' => false,
        ]);

        return $client->me()->starring()->all();
    }
}