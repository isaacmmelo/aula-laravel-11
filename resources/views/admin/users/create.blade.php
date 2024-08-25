<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create user  </title>
</head>
<body>

    <h1>Adicionar Usuário</h1>
    @if(session()->has('message'))
        <h3 style="color: red">{{ session()->get('message') }}</h3>
    @endif
    <form action="{{ route('user.store') }}" method="post">

        @csrf
        <input type="text" name="name" id="" placeholder="Nome">
        <input type="text" name="email" id="" placeholder="E-mail">
        <input type="password" name="password" id="" placeholder="Senha">

        <button type="submit">Enviar</button>

    </form>
</body>
</html>
