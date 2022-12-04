<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Inserir novo estoque</h1>
    <form action="/estoque" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
             <tr>
                <td>Descrição:</td>
                <td><input type="text" name="descricao"/></td>
            </tr>
            <tr>
                <td>Validade:</td>
                <td><input type="text" name="validade"/></td>
            </tr> 
            <tr>
                <td>Quantidade:</td>
                <td><input type="text" name="qtd_estoque"/></td>
            </tr>
            <tr>
                <td>Custo:</td>
                <td><input type="text" name="custo"/></td>
            </tr>
            <tr>
                <td>Venda:</td>
                <td><input type="text" name="venda"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/estoques" style="display: inline">Voltar</a></td>
            </tr>
        </table>
    </form>
</body>
</html>