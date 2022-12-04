<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Inserir nova venda </h1>
    <form action="/venda" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome"/></td>
            </tr>
            <tr>
                <td>Descricao:</td>
                <td><input type="text" name="descricao"/></td>
            </tr> 
            <tr>
                <td>Valor:</td>
                <td><input type="text" name="valor"/></td>
            </tr>
            <tr>
                <td>Pagamento:</td>
                <td><input type="text" name="pagamento"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/vendas" style="display: inline">Voltar</a></td>
            </tr>
        </table>
    </form>
</body>
</html>