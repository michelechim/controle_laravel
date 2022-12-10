<x-dash-layout>
    <div class="text-center mt-8">
        @vite('resources/css/show-prod.css')
        @if ($cliente)
            <h1 class='my-12 text-4xl font-bold'>{{ $cliente->nome }}</h1>
            <table>
                </thead>
                <tbody>
                    <tr>
                        <th>Endereco</th>
                        <td>{{ $cliente->endereco }}</td>
                    </tr>
                    <tr>
                        <th>Telefone</th>
                        <td>{{ $cliente->telefone }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('edit', $cliente->id) }}"><button>editar</button></a>
            <a href="{{ route('delete', $cliente->id) }}"><button>deletar</button></a>
        @else
            <p>Clientes não encontrados! </p>
        @endif
        <div>
            <a href="/clientes">Voltar</a>
        </div>
    </div>
</x-dash-layout>
