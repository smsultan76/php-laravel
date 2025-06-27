<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css">

    <title>My imlementation</title>
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/Post/create">Create</a></li>
            <li><a href="/test2">Test 2</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Welcome to My Implementation</h1>
        <p>This is a simple Laravel application demonstrating basic routing and views.</p>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
<script src="../js/app.js" ></script>
</body>
</html>