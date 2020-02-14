<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    //
    public function index($user)
    {

        $user = User::find($user);
        //dd($user);
        return view('home',
            [
                'user' => $user
            ]);
    }
}
