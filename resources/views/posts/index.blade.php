<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('posts') }}">Post Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('posts') }}">View All Posts</a></li>
        <li><a href="{{ URL::to('posts/create') }}">Create a Post</a>
        @auth
        <li> 
        {{ Form::open(array('url' => 'logout', 'method' => 'post')) }}
            {{ Form::submit(auth()->user()->name . ' - Logout', array('class' => 'btn btn-small btn-danger')) }}
        {{ Form::close() }}
        </li>
        @else
        <li><a href="{{ route('login') }}">Login</a></li>
        @endauth
    </ul>
</nav>

<h1>All the Posts</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Content</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td><a href={{ route('posts.show', $post->id) }}>{{ $post->id }}</a></td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the post (uses the destroy method DESTROY /posts/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the post (uses the show method found at GET /posts/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('posts/' . $post->id) }}">Show this Post</a>

                <!-- edit this post (uses the edit method found at GET /posts/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('posts/' . $post->id . '/edit') }}">Edit this Post</a>
                
                {{ Form::open(array('url' => 'posts/' . $post->id, 'method' => 'delete')) }}
                    {{ Form::submit('DELETE', array('class' => 'btn btn-small btn-danger')) }}
                {{ Form::close() }}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $posts->links() }}
</div>
</body>
</html>