<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
</head>

<body>
    <h1>Usuários</h1>

    <a href="{{ route('user.create') }}">Adicionar Usuário</a>

    @if(session()->has('message'))
        <h3 style="color: red">{{ session()->get('message') }}</h3>
    @endif

    <table>
        <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{route('user.edit', $user->id)}}">Editar</a>
                    <a href="{{route('user.show', $user->id)}}">Detalhes</a>
                </td>
            @empty
                <tr>
                    <td colspan="100">Nenhum registro encontrado</td>
                </tr>
        @endforelse
        </tbody>
    </table>

    {{ $users->links() }}

</body>

</html>
