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
    </ul>
</nav>

<h1>Edit {{ $post->id }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('content', 'Content') }}
        {{ Form::text('content', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Post!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>