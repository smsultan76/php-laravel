<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">

    <title>My imlementation</title>
</head>
<body>
    <header>
    <nav class="navbar">
        <h1>{{config('app.name')}}</h1>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/Post/create">Create</a></li>
            <li><a href="{{Route('home')}}">index</a></li>
        </ul>
    </nav>

    </header>
    <div class="container">
        <h1 class="mamun">Welcome to My Implementation</h1>
        <p>This is a simple Laravel application demonstrating basic routing and views.</p>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div>
        <table>
            <thead class="thead">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            @if($post->image)
                                <img src="{{ asset('images/' . $post->image) }}" alt="Post Image" style="width: 100px; height: auto;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <a href="{{ route('Post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{route('Post.delete', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                            
                    </tr>
                @endforeach
                <tr>
                    <td colspan="7">
                        {{ $posts->links() }} <!-- Pagination links -->
                    </td>
            </tbody>
        </table>
    </div>

         
<script src="js/index.js" ></script>
</body>
</html>