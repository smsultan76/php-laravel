<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
    <title>Edit Data</title>
</head>
<body>
    <header>
    <nav class="navbar">
        <h1>{{config('app.name')}}</h1>
        <ul>
            <li><a href="{{Route('home')}}">Index</a></li>
            <!-- <li><a href="/">Home</a></li> -->
            <li><a href="/Post/create">Create</a></li>
        </ul>
    </nav>

    </header>
    <h1 class="bodyh1">Edit Post</h1>
    <div class="ipform">
        <form action="{{route('Post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label><br>
            <input type="text" name="title" placeholder="Post Title" value="{{$post->title}}"><br>
            @error('title')
                <p class="alert alert-danger">{{ $message }}</>
            @enderror

            <label for="Content">Content:</label><br>
            <input type="text" name="content" placeholder="Post Content" value="{{$post->content}}"><br>
            @error('content')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror

            <label for="Image"> Select Image:</label><br>
            <input type="file" name="image" accept="image/*"><br>
            @error('image')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
            <div class="submitbtn">
                <button type="submit">Update Post</button>
            </div>
        </div>
    </form>
    </div>
</body>
</html>