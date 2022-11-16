@extends('layouts.dashboard')

@section('content')
    <h2>{{ $category->name }}</h2>

    <ul>
        @foreach ($category->posts as $post)
            <li>
                <a href="{{ route('admin.posts.show', $post->id) }}">Post Title: {{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
