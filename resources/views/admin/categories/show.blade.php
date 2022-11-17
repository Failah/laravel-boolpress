@extends('layouts.dashboard')

@section('content')
    <h2>Category: {{ $category->name }}</h2>

    <div class="my-2">
        <a href="{{ route('admin.categories.edit', $category->id) }}">Edit Category Name</a>
    </div>

    <div class="my-2">
        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input onclick="confirm('Do you really want do delete this Category?')" type="submit" value="Delete">
        </form>
    </div>

    <h3 class="mt-4">
        Related Posts with Category: {{ $category->name }}
    </h3>
    <ul>
        @foreach ($category->posts as $post)
            <li>
                <a href="{{ route('admin.posts.show', $post->id) }}">Post Title: {{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
