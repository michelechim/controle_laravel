<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a target=_blank
    href="/cliente"><button>Criar Cliente</button></a>
    @if ($clientes->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td><a target=_blank href="/clientes/{{$cliente->id}}">{{$cliente->id}}</a></td>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->endereco}}</td>
                <td>{{$cliente->telefone}}</td>
                <td><a href="{{route('edit',$cliente->id)}}">editar</a> |
                    <a href="{{route('delete',$cliente->id)}}">deletar</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Clientes não encontrados! </p>
    @endif
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a target=_blank
    href="/cliente"><button>Criar Cliente</button></a>
    @if ($clientes->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
            <td>
                <a target="_blank"href="/clientes/{{$cliente->id}}">{{$cliente->id}}</a>
            </td>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->endereco}}</td>
                <td>{{$cliente->telefone}}</td>
                <td><a href="{{route('edit',$cliente->id)}}">editar</a> |
                    <a href="{{route('delete',$cliente->id)}}">deletar</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Clientes não encontrados! </p>
    @endif
</body>
</html> -->