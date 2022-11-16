@extends('layouts.dashboard')

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.categories.create') }}">Add new Category</a>
    </div>
    <h2>
        Category List:
    </h2>

    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
