<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista do Estoque</title>
</head>
<body>
    @if ($estoque)

        <h1>{{ $estoque->descricao }}</h1>
        <ul>
            <li>Validade: {{ $estoque->validade}}</li>
            <li>Quantidade: {{ $estoque->qtd_estoque }}</li>
            <li>Custo: {{$estoque->custo}}</li>
            <li>Venda: {{$estoque->venda}}</li>
        </ul>
    @else
        <p>Estoque não encontrado! </p>
    @endif
    <a target="_blank" href="/estoques">Voltar</a>
</body>
</html>