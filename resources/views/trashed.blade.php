<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>

    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <a href="{{ route('posts.create')}}" class="btn btn-primary">Criar novo Post</a> ||
        <a href="{{ route('posts.index')}}" class="btn btn-success">Ver Todos</a>
    </div>
<div class="container my-5">
    @if (!empty($posts))
    <section class="articles_list">
        @foreach ($posts as $post)
        <article class="mb-5">
            <h1>{{ $post-> title }}</h1>
            <h2>{{ $post-> subtitle }}</h2>
            <p>{{ $post-> description }}</p>
            <small>Criado em: {{ $post->created_at->format('d/m/Y H:i') }} - Editado em: {{ $post->updated_at->format('d/m/Y H:i') }}</small>

            <form action="{{route('posts.forceDelete', ['post' => $post->id])}}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('posts.restore', ['post' => $post->id])}}" class="btn btn-info">Restaurar este Post</a> ||
                <button type="submit" class="btn btn-danger">Excluir este Post permanentemente!</button>
            </form>
        </article>
        <hr>

        @endforeach

    </section>

    @endif

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
