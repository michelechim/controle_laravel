<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    @if ($cliente)
        <h1>{{ $cliente->nome }}</h1>
        <ul>
            <li>Endereço: {{ $cliente->endereco }}</li>
            <li>Telefone: {{ $cliente->telefone }}</li>
        </ul>
    @else
        <p>Clientes não encontrados! </p>
    @endif
    <a target="_blank" href="/clientes">Voltar</a>
</body>
</html>