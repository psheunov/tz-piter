@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="h2">{{ $post->title }}</h2>
                <p>
                    {{ $post->content }}
                </p>
                <div class="d-flex p-2">
                   <p>Like - {{ $post->votedUsers()->count() }}</p>
                    @auth()
                        <form action="{{ route('post.like', $post->id) }}" method="post">
                            @csrf
                            <button style="background: transparent; border: none" type="submit">
                                <i class="{{ (auth()->user()->likedPosts->contains($post->id)) ? 'fa-solid ' : 'fa-regular' }} fa-heart"></i>
                            </button>
                        </form>
                    @else
                        <i class="fa-regular fa-heart"></i>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
