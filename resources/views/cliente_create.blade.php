<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Inserir novo cliente</h1>
    <form action="/cliente" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome"/></td>
            </tr>
            <tr>
                <td>Endereço:</td>
                <td><textarea name="endereco" cols="20" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input type="text" name="telefone"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/clientes" style="display: inline">Voltar</a></td>
            </tr>
        </table>
    </form>
</body>
</html>