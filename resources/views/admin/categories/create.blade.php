@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row">
            <div class="col-12 bg-danger">
                Error: please fill all fields correctly!
            </div>
        </div>
    @endif
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">New category name:</label>
            <input maxlength="50" required type="text" name="name" value="{{ old('name', '') }}">
            @error('name')
                <div class="bg-danger text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <input type="submit" value="Create">
    </form>
@endsection
