@extends('layouts.dashboard')

@section('content')
    <h2>
        Tag Name: {{ $tag->name }}
    </h2>

    {{-- edit tag name --}}
    <div>
        <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ old('name', $tag->name) }}">
            <input type="submit" value="Edit Tag Name">
            @error('name')
                <div class="my-2 bg-danger text-white">
                    {{ $message }}
                </div>
            @enderror
        </form>
    </div>

    {{-- delete tag --}}
    <div class="my-3">
        <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST"></form>
        @csrf
        @method('DELETE')
        <input onclick="return confirm('Do you really want to delete this tag?')" type="submit" value="Delete Tag">
    </div>

    {{-- associated tag posts --}}
    <h3 class="mt-4">
        Associated Posts List:
    </h3>
    <div>
        <ul>
            @foreach ($tag->posts as $post)
                <li>
                    <a href="{{ route('admin.posts.show', $post->id) }}">Post Title: {{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
