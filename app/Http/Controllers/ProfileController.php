<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{


    //
    public function index(User $user)
    {


        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(sprintf('count.posts.%s',
            $user->id), now()->addSeconds(30), function () use ($user) {
            return $user->posts->count();
        });
        $followersCount = Cache::remember(sprintf("count.followers.%s",
            $user->id), now()->addSeconds(30), function () use ($user) {
            return $user->profile->followers->count();
        });
        $followingCount = Cache::remember(sprintf("count.following.%s",
            $user->id),
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });
        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
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
            $imageArray = ['image' => $imagePath];
        }
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect("/profile/{$user->id}");

    }
}
