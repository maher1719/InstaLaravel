@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img
                    src="https://instagram.ftun9-1.fna.fbcdn.net/v/t51.2885-19/s150x150/60468629_2071308019658649_8105413550312259584_n.jpg?_nc_ht=instagram.ftun9-1.fna.fbcdn.net&_nc_ohc=eI3Bh8aiSlgAX9OisCk&oh=e9f7da60f361a4619f7f489de52e6889&oe=5EC75F9C"
                    alt="" class="rounded-circle">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>
                        {{$user->username}}
                    </h1>
                    <a href="/p/create">
                        ajouter image
                    </a>
                </div>
                <a href="/profile/{{$user->id}}/edit">Edit profile</a>
                <div class="d-flex">
                    <div class="pr-3"><strong>{{$user->posts->count()}}</strong> posts</div>
                    <div class="pr-3"><strong>34</strong> followers</div>
                    <div class="pr-3"><strong>44</strong> following</div>
                </div>
                <div class="pt-3 font-weight-bold">{{$user->profile->title}}</div>
                <div>
                    {{$user->profile->description}}
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
