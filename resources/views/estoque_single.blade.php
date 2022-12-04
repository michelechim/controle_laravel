<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista do Estoque</title>
</head>
<body>
    @if ($estoques)

        <h1>{{ $estoques->descricao }}</h1>
        <ul>
            <li>Validade: {{ $estoques->validade}}</li>
            <li>Quantidade: {{ $estoques->qtd_estoque }}</li>
            <li>Custo: {{$estoques->custo}}</li>
            <li>Venda: {{$estoques->venda}}</li>
        </ul>
    @else
        <p>Estoque não encontrado! </p>
    @endif
    <a target="_blank" href="/estoques">Voltar</a>
</body>
</html>