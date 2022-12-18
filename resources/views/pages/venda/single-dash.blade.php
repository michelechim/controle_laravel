<x-dash-layout>
    <div class="text-center mt-8">
        @vite('resources/css/show-prod.css')
        @if ($venda)
            <h1 class='my-12 text-4xl font-bold'>{{ $venda->nome }}</h1>
            <table>
                </thead>
                <tbody>
                    <tr>
                        <th>Descrição</th>
                        <td>{{ $venda->descricao }}</td>
                    </tr>
                    <tr>
                        <th>Valor</th>
                        <td>{{ $venda->valor }}</td>
                    </tr>
                    <tr>
                        <th>Pagamento</th>
                        <td>{{ $venda->pagamento }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('venda_edit', $venda->id) }}"><button>editar</button></a>
            <a href="{{ route('venda_delete', $venda->id) }}"><button>deletar</button></a>
        @else
            <p>Vendas não encontrados! </p>
        @endif
        <div>
            <a href="/vendas">Voltar</a>
        </div>
    </div>
</x-dash-layout>
