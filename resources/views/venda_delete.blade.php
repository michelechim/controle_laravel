<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vendas /title>
</head>
<body>
    @if ($venda)
        <h1>{{ $venda->nome }}</h1>
        <ul>
            <li>Descrição: {{ $venda->descricao }} </li>
            <li>Valor: {{ $venda->valor }} </li>
            <li>Pagamento: {{ $venda->pagamento }} </li>
        </ul>
        <form action="{{route('remove',$venda->id)}}" method="post">
            @csrf
            <h4 style="color:red;font-weight:bold">Confirmar a exclusão deste item?</h4>
            <table>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" name='confirmar' value="Deletar"/>
                        <input type="submit" name='confirmar' value="Cancelar"/>
                    </td>
                </tr>
            </table>
        </form>
    @else
        <p>Vendas não encontrados! </p>
        <a href="/vendas">Voltar</a>
    @endif
</body>
</html>