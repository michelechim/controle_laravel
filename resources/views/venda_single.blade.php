<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vendas</title>
</head>
<body>
    @if ($vendas)
        <ul>
            <li>Cliente: {{ $vendas->nome }}</li>
            <li>Descricao: {{ $vendas->descricao }}</li>
            <li>Valor: {{ $vendas->valor }}</li>
            <li>Pagamento: {{$vendas->pagamento }}</li>
        </ul>
    @else
        <p>Venda não encontrado! </p>
    @endif
    <a target="_blank" href="/vendas">Voltar</a>
</body>
</html>