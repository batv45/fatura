<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $userSettings = auth()->user()->settings()->all();

        return inertia('Account/Profile',[
            'page_user_settings' => $userSettings
        ]);
    }
}
