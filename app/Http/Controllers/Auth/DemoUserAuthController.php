<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DemoUserAuthController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::firstOrCreate([
            'email' => 'demo@interview_foundation.com',
        ],
            [
                'name' => 'Demo User',
                'password' => Hash::make('password')
            ]);

        Auth::login($user);

        return redirect('/');
    }
}
