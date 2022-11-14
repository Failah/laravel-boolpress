@extends('layouts.dashboard')

@section('content')
    @foreach ($posts as $post)
        <div>
            <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
        </div>
    @endforeach
@endsection
