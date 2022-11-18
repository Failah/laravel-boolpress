@extends('layouts.dashboard')

@section('content')
    <h2>Tag List:</h2>
    <ul>
        @foreach ($tags as $tag)
            <li class="my-2">
                <a href="{{ route('admin.tags.show', $tag->id) }}">{{ $tag->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
