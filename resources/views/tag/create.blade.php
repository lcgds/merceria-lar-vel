<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastrar Tag</title>
    @include('layouts.links')

</head>

<body>
    @include('layouts.header')
    <main class="container">
        <h1 class="mt-4 mb-3">Cadastrar Tag</h1>
        <form method="post" action="{{ route('tag.store') }}">
            @csrf
            <div class="form-floating my-3">
                <input class="form-control" name="name" type="text" focused>
                <label class="form-label" for="name">Nome</label>
            </div>

            <button class="btn btn-success" type="submit">Salvar</button>
        </form>
    </main>
</body>

</html>
