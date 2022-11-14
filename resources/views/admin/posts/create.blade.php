@extends('layouts.dashboard')

@section('content')
    <form method="POST" action="{{ route('admin.posts.store') }}">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" cols="30" rows="10"></textarea>
        </div>
        <input type="submit" value="Create">
    </form>
@endsection
