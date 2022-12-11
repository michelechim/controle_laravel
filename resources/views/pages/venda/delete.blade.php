<x-dash-layout>
    @if ($venda)
        <h1>{{ $venda->nome }}</h1>
        <ul>
            <li>Descricao: {{ $venda->endereco }}</li>
            <li>Valor: {{ $venda->telefone }}</li>
            <li>Pagamento: {{ $venda->pagamento }}</li>
        </ul>
        <form action="{{ route('remove', $venda->id) }}" method="post">
            @csrf
            <h4 style="color:red;font-weight:bold">Confirmar a exclusão deste item?</h4>
            <input type="submit" name='confirmar' value="Deletar" />
            <input type="submit" name='confirmar' value="Cancelar" />
        </form>
    @else
        <p>Vendas não encontrados! </p>
        <a href="/dashboard">Voltar</a>
    @endif
</x-dash-layout>
