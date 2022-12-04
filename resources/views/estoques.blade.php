<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista do Estoque</title>
</head>
<body>
    <h1>Estoque</h1>
    <a target=_blank
    href="/estoque"><button>Criar Estoque</button></a>
    @if ($estoques->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Descrição</th>
                <th>Validade</th>
                <th>Quantidade</th>
                <th>Custo</th>
                <th>Venda</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estoques as $estoque)
            <tr>
            <td><a target="_blank"href="/estoques/{{$estoque->id}}">{{$estoque->id}}</a></td>
                <td>{{$estoque->descricao}}</td>
                <td>{{$estoque->validade}}</td>
                <td>{{$estoque->qtd_estoque}}</td>
                <td>{{$estoque->custo}}</td>
                <td>{{$estoque->venda}}</td>
                <td><a href="{{route('edit',$estoque->id)}}">editar</a> |
                    <a href="{{route('delete',$estoque->id)}}">deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Estoque não encontrado! </p>
    @endif
</body>
</html>