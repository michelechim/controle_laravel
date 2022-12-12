<x-dash-layout>
    @if ($estoque)
        <h1>{{ $estoque->descricao }}</h1>
        <ul>
            <li>Quantidade: {{ $estoque->qtd_estoque }}</li>
            <li>Validade: {{ $estoque->validade }}</li>
            <li>Custo: {{ $estoque->custo }}</li>
            <li>Venda: {{ $estoque->venda }}</li>
        </ul>
        <form action="{{ route('estoque_remove', $estoque->id) }}" method="post">
            @csrf
            <h4 style="color:red;font-weight:bold">Confirmar a exclusão deste item?</h4>
            <input type="submit" name='confirmar' value="Deletar" />
            <input type="submit" name='confirmar' value="Cancelar" />
        </form>
    @else
        <p>Estoques não encontrados! </p>
        <a href="/dashboard">Voltar</a>
    @endif
</x-dash-layout>
