<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Inserindo novo Venda</h1>
    <form action="{{route('update',$venda->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$venda->nome}}"/></td>
            </tr>
            <tr>
                <td>Descricao:</td>
                <td><input type="text" name="descricao"value="{{$venda->descricao}}"/></td>
            </tr> 
            <tr>
                <td>Valor:</td>
                <td><input type="text" name="valor" value="{{$venda->valor}}"/></td>
            </tr>
            <tr>
                <td>Pagamento:</td>
                <td><input type="text" name="pagamento" value="{{$venda->pagamento}}"/></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" name='confirmar' value="Salvar"/>
                </td>
            </tr>
        </table>
    </form>
    <a href="/vendas"><button>Cancelar</button></a>
</body>
</html>