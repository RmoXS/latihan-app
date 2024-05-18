@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label>Title:</label>
        <input type="text" name="title"><br>
        <label>Content:</label>
        <textarea name="content"></textarea><br>
        <button type="submit">Save</button>
    </form>
@endsection