@extends('layouts.dashboard')

@section('content')
    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}">
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
        </div>
        <input type="submit" value="Apply changes">
    </form>
    <div class="mt-5">
        <a href="{{ route('admin.posts.index') }}">BACK TO THE POSTS LIST</a>
    </div>
@endsection
