@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img
                    src="{{$user->profile->profileImage()}} "
                    alt="" class="rounded-circle w-100">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline pb-3">
                    <div class="d-flex align-items-center">
                        <div class="h2 ">
                            {{$user->username}}
                        </div>
                        @cannot('update',$user->profile)
                            <follow-button user-id="{{ $user->id }}" follows="{{$follows}}"></follow-button>
                        @endcannot
                    </div>

                    @can('update',$user->profile)
                        <a href="/p/create">
                            ajouter image
                        </a>
                    @endcan

                </div>

                @can('update',$user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit profile</a>
                @endcan
                <div class="d-flex">
                    <div class="pr-3"><strong>{{$user->posts->count()}}</strong> posts</div>
                    <div class="pr-3"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                    <div class="pr-3"><strong>{{$user->following->count()}}</strong> following</div>
                </div>
                <div class="pt-3 font-weight-bold">{{$user->profile->title ?? ''}}</div>
                <div>
                    {{$user->profile->description ?? ''}}
                </div>
                <div><a href="#">{{$user->profile->url ?? 'N/A' }}</a></div>
            </div>
        </div>
        <div class="row pt-4">
            @foreach($user->posts as $post)
                <div class="col-4 pt-4">
                    <a href="/p/{{$post->id}}">
                        <img class="w-100"
                             src="/storage/{{$post->image}}"/>
                    </a>

                </div>
            @endforeach

        </div>
    </div>
@endsection
