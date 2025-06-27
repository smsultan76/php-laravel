<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>

    <h1>Create New Post</h1>
    <form action="{{route('Post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label><br>
            <input type="text" name="title" placeholder="Post Title" value="{{old('title')}}"><br>
            @error('title')
                <p class="alert alert-danger">{{ $message }}</>
            @enderror

            <label for="Content">Content:</label><br>
            <input type="text" name="content" placeholder="Post Content" value="{{old('content')}}"><br>
            @error('content')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror

            <label for="Image"> Select Image:</label><br>
            <input type="file" name="image" accept="image/*" value="{{old('image')}}"><br>
            @error('image')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
            <button type="submit">Create Post</button>
        </div>
    </form>
</body>
</html>