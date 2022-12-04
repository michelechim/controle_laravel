<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estoque</title>
</head>
<body>
    @if ($estoque)
        <h1>{{ $estoque->descricao }}</h1>
        <ul>
            <li>Validade: {{ $estoque->endereco }} </li>
            <li>Quantidade: {{ $estoque->qtd_estoque}}</li>
            <li>Custo: {{ $estoque->custo }} </li>
            <li>Venda: {{ $estoque->venda }} </li>
        </ul>
        <form action="{{route('remove',$estoque->id)}}" method="post">
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
        <p>Estoques não encontrados! </p>
        <a href="/clientes">Voltar</a>
    @endif
</body>
</html>