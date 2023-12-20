@extends('layouts.app')

@section('title', 'Index')

@section('content')
    @forelse ($all_posts as $post)
        <div class="p-3 border border-dark rounded mb-3">
            <p>
                <a href="" class="text-decoration-none">{{ $post->title }}</a>
            </p>
            <p>
                {{$post->description}}
            </p>
        </div>
    @empty
        <div style="margin-top:100px">
            <h2 class="text-muted text-center">No Posts Yet</h2>
            <p class="text-center">
                <a href="{{ route('post.create') }}" class="text-decoration-none">Create a new post</a>
            </p>
        </div>
    @endforelse
@endsection
