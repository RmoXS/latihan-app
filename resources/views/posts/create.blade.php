@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{old('title')}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Content:</label>
            <textarea name="content">{{old('content')}}</textarea>
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit">Save</button>
    </form>
@endsection