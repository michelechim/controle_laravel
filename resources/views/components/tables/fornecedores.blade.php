<table {{ $attributes->merge(['class' => 'table table-' . $type]) }}>
    @vite('resources/css/table.css')
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>CNPJ</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Estado</th>
            @if(Auth::user() && Route::is('dashboard'))
                <th>Ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($fornecedores as $fornecedor)
            <tr>
                @if(Auth::user() && Route::is('dashboard'))
                     <td><a href="{{route('fornecedor.single-dash',$fornecedor->id) }}">{{ $fornecedor->id }}</a></td>
                     <td><a href="{{route('fornecedor.single-dash',$fornecedor->id) }}">{{ $fornecedor->nome }}</a></td>
                @else
                    <td><a href="/fornecedores/{{ $fornecedor->id }}">{{ $fornecedor->id }}</a></td>
                    <td><a href="/fornecedores/{{ $fornecedor->id }}">{{ $fornecedor->nome }}</a></td>
                @endif

                <td>{{ $fornecedor->endereco }}</td>
                <td>{{ $fornecedor->cnpj }}</td>
                <td>{{ $fornecedor->telefone }}</td>
                <td>{{ $fornecedor->email }}</td>
                <td>{{ $fornecedor->estado->uf }}</td>

                @if(Auth::user() && Route::is('dashboard'))
                    <td><a href="{{ route('fornecedor_edit', $fornecedor->id) }}">editar</a> |
                        <a href="{{ route('fornecedor_delete', $fornecedor->id) }}">deletar</a>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
