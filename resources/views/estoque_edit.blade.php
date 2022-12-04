<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Inserindo novo Estoque</h1>
    <form action="{{route('update',$estoque->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Descrição:</td>
                <td><input type="text" name="descricao" value="{{$estoque->descricao}}"/></td>
            </tr>
            <tr>
                <td>Validade:</td>
                <td><input type="text" name="validade" value="{{$estoque->validade}}"/></td>
            </tr> 
            <tr>
                <td>Quantidade:</td>
                <td><input type="text" name="qtd_estoque" value="{{$estoque->qtd_estoque}}"/></td>
            </tr>
            <tr>
                <td>Custo:</td>
                <td><input type="text" name="custo" value="{{$estoque->custo}}"/></td>
            </tr>
            <tr>
                <td>Venda:</td>
                <td><input type="text" name="venda" value="{{$estoque->venda}}"/></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" name='confirmar' value="Salvar"/>
                </td>
            </tr>
        </table>
    </form>
    <a href="/estoques"><button>Cancelar</button></a>
</body>
</html>