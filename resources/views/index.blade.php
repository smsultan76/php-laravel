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
                <li><a href="{{Route('home')}}">Index</a></li>
                <!-- <li><a href="/">Home</a></li> -->
                <li><a href="/Post/create">Create</a></li>
            </ul>
        </nav>

    </header>
    <div class="container">
        <h2 class="mamun">Welcome to My Implementation</h2>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif(session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}

        </div>
        @endif

    </div>
    <div>
        <table>
            <caption class="table-caption">
                <div class="caption-content">
                    <h3>Data Table</h3>
                    <form action="{{route('index.search')}}" method="get">
                        <input type="text" name="search" placeholder="Search by title" value="{{ request('search') }}">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </caption>
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
                    <td class="action-buttons">
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
                        {{ $posts->links('',['foo'=>'bar']) }} <!-- Pagination links -->
                    </td>
            </tbody>
        </table>
    </div>


    <script src="js/index.js"></script>
</body>

</html>