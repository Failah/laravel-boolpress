@extends('layouts.dashboard')

@section('content')
    <div>
        Title: {{ $post->title }}
    </div>
    <div>
        Content: {{ $post->content }}
    </div>
@endsection
