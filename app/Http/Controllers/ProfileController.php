<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    //
    public function index(User $user)
    {


        //dd($user);
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {


        //dd($user->profile);
        try {
            $this->authorize('update', $user->profile);
        } catch (AuthorizationException $e) {
        }

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);


        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');


            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);

            $image->save();
        }
        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imagePath]
        ));
        return redirect("/profile/{$user->id}");

    }
}
