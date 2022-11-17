@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row">
            <div class="col-12 bg-danger">
                Error: please fill all fields correctly!
            </div>
        </div>
    @endif
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="name">Edit category name:</label>
            <input maxlength="50" required type="text" name="name" value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="bg-danger text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <input type="submit" value="Update">
    </form>
@endsection
