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
        <a href="{{ route('posts.index')}}" class="btn btn-success">Ver Todos</a>
    </div>

<div class="container my-5">
    <form action="{{ route('posts.store')}}" method="POST" autocomplete="off">

        @csrf

        <div class="form-group mb-2">
            <label for="title">Título:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group mb-2">
            <label for="subtitle">Subtítulo:</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle">
        </div>

        <div class="form-group mb-2">
            <label for="description">Descrição:</label>
            {{-- <input type="text" class="form-control" id="description" name="description"> --}}
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Enviar!</button>
    </form>
</div>

{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
