<x-dash-layout>
    <div class="text-center mt-8">
        @vite('resources/css/show-prod.css')
        @if ($fornecedor)
            <h1 class='my-12 text-4xl font-bold'>{{ $fornecedor->nome }}</h1>
            <table>
                </thead>
                <tbody>
                    <tr>
                        <th>Endereço</th>
                        <td>{{ $fornecedor->endereco }}</td>
                    </tr>
                    <tr>
                        <th>CNPJ</th>
                        <td>{{ $fornecedor->cnpj }}</td>
                    </tr>
                    <tr>
                        <th>Telefone</th>
                        <td>{{ $fornecedor->telefone }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $fornecedor->email }}</td>
                    </tr>
                    <tr>
                        <th>Id - estado</th>
                        <td>{{ $fornecedor->estado_id }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('fornecedor_edit', $fornecedor->id) }}"><button>editar</button></a>
            <a href="{{ route('fornecedor_delete', $fornecedor->id) }}"><button>deletar</button></a>
        @else
            <p>Fornecedores não encontrados! </p>
        @endif
        <div>
            <a href="/fornecedores">Voltar</a>
        </div>
    </div>
</x-dash-layout>
