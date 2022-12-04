<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista das Vendas</title>
</head>
<body>
    <h1>Vendas</h1>
    <a target=_blank
    href="/venda"><button>Criar Estoque</button></a>
    @if ($vendas->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Cliente</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Pagamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
            <tr>
                <td>
                    <a target="_blank"href="/vendas/{{$venda->id}}">{{$venda->id}}</a>
                </td>
                <td>{{$venda->nome}}</td>
                <td>{{$venda->descricao}}</td>
                <td>{{$venda->valor}}</td>
                <td>{{$venda->pagamento}}</td>
                <td><a href="{{route('edit',$venda->id)}}">editar</a> |
                    <a href="{{route('delete',$venda->id)}}">deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Venda não encontrada! </p>
    @endif
</body>
</html>