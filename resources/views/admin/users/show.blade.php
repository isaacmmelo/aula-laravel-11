<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes user  </title>
</head>
<body>

<h1>Detalhes</h1>
@if(session()->has('message'))
    <h3 style="color: red">{{ session()->get('message') }}</h3>
@endif
<ul>
    <li>Nome: {{ $user->name }}</li>
    <li>Email: {{ $user->email }}</li>
</ul>

<form action="{{ route('user.destroy',$user->id) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Excluir</button>
</form>
</body>
</html>
