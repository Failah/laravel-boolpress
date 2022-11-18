@extends('layouts.dashboard')

@section('content')
    <div class="py-2">
        Title: {{ $post->title }}
    </div>

    @if ($post->category)
        <div class="py-2">
            <a href="{{ route('admin.categories.show', $post->category->id) }}">Category: {{ $post->category->name }}</a>
        </div>
    @else
        <p class="mt-3">Category: No category has been selected for this post.</p>
    @endif
    <div class="py-2">
        Content: {{ $post->content }}
    </div>
    <div class="mt-2">
        <span>Tags:</span>
        @foreach ($post->tags as $tag)
            <span>{{ $tag->name }}</span>
        @endforeach
    </div>

    {{-- image --}}
    <div>
        <img class="img-fluid" src="{{ asset('storage/' . $post->cover_path) }}" alt="{{ $post->title }}">
    </div>

    {{-- utility buttons --}}
    <div class="mt-3">
        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit Post</a>
    </div>
    <div>
        <form class="mt-3" method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
            @csrf
            @method('DELETE')
            <input onclick="return confirm('Do you really want to delete this post?')" type="submit" value="Delete">
        </form>
    </div>
    <div class="mt-5">
        <a href="{{ route('admin.posts.index') }}">BACK TO THE POSTS LIST</a>
    </div>
@endsection
