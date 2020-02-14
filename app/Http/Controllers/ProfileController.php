<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    //
    public function index($user)
    {

        $user = User::findOrFail($user);
        //dd($user);
        return view('profiles.index',
            [
                'user' => $user
            ]);
    }
}
