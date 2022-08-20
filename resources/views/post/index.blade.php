@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @php
                //TODO переделать на Vue js
            @endphp
        @foreach($posts as $post)
                <div class="col">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <a class="btn btn-primary" href="{{ route('post.show',[$post->slug]) }}">Primary</a>
                        </div>

                        <div class="d-flex p-2">
                            <p>Like - {{ $post->votedUsers()->count() }}</p>
                            @php
                            //TODO Вынести в отдельный компонент, и отправлять запрос через ajax
                            @endphp
                            @auth()
                                <form action="{{ route('post.like', $post->id) }}" method="post">
                                    @csrf
                                    <button style="background: transparent; border: none" type="submit">
                                        @php
                                            //TODO запрашивать лайки пользователя один раз для всех постов
                                        @endphp
                                        <i class="{{ (auth()->user()->likedPosts->contains($post->id)) ? 'fa-solid ' : 'fa-regular' }} fa-heart"></i>
                                    </button>
                                </form>
                            @else
                                <i class="fa-regular fa-heart"></i>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
