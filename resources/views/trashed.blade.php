<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<a href="{{ route('posts.create')}}">Criar novo Post</a> ||
<a href="{{ route('posts.index')}}">Ver Todos</a>
<div class="container my-5">
    @if (!empty($posts))
    <section class="articles_list">
        @foreach ($posts as $post)
        <article class="mb-5">
            <h1>{{ $post-> title }}</h1>
            <h2>{{ $post-> subtitle }}</h2>
            <p>{{ $post-> description }}</p>
            <small>Criado em: {{ $post->created_at->format('d/m/Y H:i') }} - Editado em: {{ $post->updated_at->format('d/m/Y H:i') }}</small>
            <a href="{{ route('posts.restore', ['post' => $post->id])}}">Restaurar este Post</a> ||
            <form action="{{route('posts.forceDelete', ['post' => $post->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir este Post permanentemente!</button>
            </form>
        </article>
        <hr>

        @endforeach

    </section>

    @endif

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
