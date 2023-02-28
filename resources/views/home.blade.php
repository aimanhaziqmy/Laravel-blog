

@extends('layouts.default')
@section('content')
<body>
    @auth
        <p>Congrats you are logged in</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>

        <x-forms.input type="success" />

    <div style="border: 3px solid black;">
        <h2>Create a new posts</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input name="title" type="text" placeholder="Title">
            <input name="body" type="text" placeholder="body content...">
            <button>Create Post</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>All Posts</h2>
        @foreach ($posts as $post)
            <div style="border: 1px solid black; background-color:gray; padding: 10px; margin: 10px;">
                <h3>{{ $post->title }} by {{$post->user->name}}</h3>
                <p>{{ $post['body']}}</p>
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        @endforeach

        @empty($posts)
            <p>No posts found</p>
        @endempty
    @else

    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="Name">
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="text" placeholder="Password">
            <button>Register</button>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginemail" type="text" placeholder="Email">
            <input name="loginpassword" type="text" placeholder="Password">
            <button>Login</button>
        </form>
    </div>
    @endauth

@stop
