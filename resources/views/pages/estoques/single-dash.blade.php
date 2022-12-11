<x-dash-layout>
    <div class="text-center mt-8">
        @vite('resources/css/show-prod.css')
        @if ($estoque)
            <h1 class='my-12 text-4xl font-bold'>{{ $estoque->descricao }}</h1>
            <table>
                </thead>
                <tbody>
                    <tr>
                        <th>Validade</th>
                        <td>{{ $estoque->validade }}</td>
                    </tr>
                    <tr>
                        <th>Quantidade</th>
                        <td>{{ $estoque->qtd_estoque }}</td>
                    </tr>
                    <tr>
                        <th>Custo</th>
                        <td>{{ $estoque->custo }}</td>
                    </tr>
                    <tr>
                        <th>Venda</th>
                        <td>{{ $estoque->venda }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('edit', $estoque->id) }}"><button>editar</button></a>
            <a href="{{ route('delete', $estoque->id) }}"><button>deletar</button></a>
        @else
            <p>Estoque não encontrados! </p>
        @endif
        <div>
            <a href="/estoques">Voltar</a>
        </div>
    </div>
</x-dash-layout>
