@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <label>Title:</label>
        <input type="text" name="title" value="{{ $post->title }}"><br>
        <label>Content:</label>
        <textarea name="content">{{ $post->content }}</textarea><br>
        <button type="submit">Update</button>
    </form>
@endsection