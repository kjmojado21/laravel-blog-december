@extends('layouts.app')

@section('title','Show page')

@section('content')
    <div class="shadow p-5">
        <p class="display-6">{{ $post->title }}</p>
        <p class="text-muted">{{ $post->user->name }}</p>
        <p>{{ $post->description }}</p>

        <img src="{{ asset('/storage/images/'.$post->image) }}" alt="" class="w-100 img-thumbnail">
    </div>
    <form action="{{route('comment.store',$post->id)}}" method="post" class="mt-5">
        @csrf
        <div class="input-group">
            <input type="text" name="body" id="" class="form-control">
            <button type="submit" class="btn btn-primary">Post</button>
        </div>
    </form>
@endsection
